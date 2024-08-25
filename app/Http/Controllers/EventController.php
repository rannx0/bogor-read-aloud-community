<?php

namespace App\Http\Controllers;

use carbon\Carbon;
use App\Models\Event;
use App\Models\Sponsor;
use App\Models\MediaPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['mediaPartners', 'sponsors'])->get();
        return view('backend.events.index', compact('events'));
    }

    public function show($id)
    {
        // Mengambil data event berdasarkan ID
        $event = Event::with(['mediaPartners', 'sponsors'])->findOrFail($id);

        // Mengarahkan ke view 'show' dengan data event
        return view('backend.events.show', compact('event'));
    }

    public function showDetail($judul)
    {
        $judul = urldecode($judul); // Jika perlu mendecode URL
        $event = Event::where('judul', $judul)->firstOrFail();
        return view('frontend.events.show', compact('event'));
    }

    public function create()
    {
        return view('backend.events.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'tanggal_dilaksanakan' => 'nullable|date_format:Y-m-d',
            'tanggal_akhir_pendaftaran' => 'nullable|date_format:Y-m-d',
            'waktu_mulai' => 'nullable|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'harga_tiket_masuk' => 'required|numeric',
            'kegiatan' => 'required|string',
            'kuota' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'link_pendaftaran' => 'nullable|url',
            'media_partner_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Konversi tanggal dan waktu jika diperlukan
        $validated['tanggal_dilaksanakan'] = Carbon::createFromFormat('Y-m-d', $validated['tanggal_dilaksanakan'])->format('Y-m-d');
        $validated['tanggal_akhir_pendaftaran'] = Carbon::createFromFormat('Y-m-d', $validated['tanggal_akhir_pendaftaran'])->format('Y-m-d');
        $validated['waktu_mulai'] = Carbon::createFromFormat('H:i', $validated['waktu_mulai'])->format('H:i:s');
        $validated['waktu_selesai'] = Carbon::createFromFormat('H:i', $validated['waktu_selesai'])->format('H:i:s');
        

        // Simpan data event
        $event = Event::create($validated);

        // Simpan thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('event_thumbnail', 'public');
            $event->thumbnail = $thumbnailPath;
            $event->save();
        }

        // Simpan logo media partner
        if ($request->hasFile('media_partner_logos')) {
            foreach ($request->file('media_partner_logos') as $file) {
                $path = $file->store('public/media_partners'); // Menyimpan di storage/app/public/media_partners
                MediaPartner::create(['event_id' => $event->id, 'logo_path' => $path]);
            }
        }

        // Simpan logo sponsor
        if ($request->hasFile('sponsor_logos')) {
            foreach ($request->file('sponsor_logos') as $file) {
                $path = $file->store('public/sponsors'); // Menyimpan di storage/app/public/sponsors
                Sponsor::create(['event_id' => $event->id, 'logo_path' => $path]);
            }
        }

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('backend.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'tanggal_dilaksanakan' => 'nullable|date_format:Y-m-d',
            'tanggal_akhir_pendaftaran' => 'nullable|date_format:Y-m-d',
            'waktu_mulai' => 'nullable|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'harga_tiket_masuk' => 'required|numeric',
            'kegiatan' => 'required|string',
            'kuota' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'link_pendaftaran' => 'nullable|url',
            'media_partner_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['tanggal_dilaksanakan'] = Carbon::createFromFormat('Y-m-d', $validated['tanggal_dilaksanakan'])->format('Y-m-d');
        $validated['tanggal_akhir_pendaftaran'] = Carbon::createFromFormat('Y-m-d', $validated['tanggal_akhir_pendaftaran'])->format('Y-m-d');
        $validated['waktu_mulai'] = Carbon::createFromFormat('H:i', $validated['waktu_mulai'])->format('H:i:s');
        $validated['waktu_selesai'] = Carbon::createFromFormat('H:i', $validated['waktu_selesai'])->format('H:i:s');

        $event->update($validated);

        // Update gambar thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($event->thumbnail) {
                Storage::delete($event->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }
        
        // Menyimpan logo media partner
        if ($request->hasFile('media_partner_logos')) {
            // Hapus logo lama
            $event->mediaPartners()->delete();
            foreach ($request->file('media_partner_logos') as $file) {
                $path = $file->store('media_partners');
                MediaPartner::create(['event_id' => $event->id, 'logo_path' => $path]);
            }
        }

        // Menyimpan logo sponsor
        if ($request->hasFile('sponsor_logos')) {
            // Hapus logo lama
            $event->sponsors()->delete();
            foreach ($request->file('sponsor_logos') as $file) {
                $path = $file->store('sponsors');
                Sponsor::create(['event_id' => $event->id, 'logo_path' => $path]);
            }
        }

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        // Hapus foto thumbnail event
        Storage::delete($event->thumbnail);
    
        // Hapus logo media partner
        foreach ($event->mediaPartners as $mediaPartner) {
            Storage::delete($mediaPartner->logo_path);
        }
        $event->mediaPartners()->delete();
    
        // Hapus logo sponsor
        foreach ($event->sponsors as $sponsor) {
            Storage::delete($sponsor->logo_path);
        }
        $event->sponsors()->delete();
    
        // Hapus event
        $event->delete();
    
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function resetEventIds()
    {
        DB::statement('ALTER TABLE events AUTO_INCREMENT = 1');
        return redirect()->route('events.index')->with('success', 'Event IDs reset successfully.');
    }
}
