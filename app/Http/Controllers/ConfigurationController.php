<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    public function index($id = 1)
    {
        // Ambil data konfigurasi berdasarkan ID atau buat instance baru jika tidak ada
        $configuration = Configuration::find($id) ?? new Configuration;
    
        return view('backend.configurations.form', compact('configuration'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name_instansi' => 'nullable|string',
            'footer_name' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'nullable|string',
            'email' => 'nullable|email',
            'alamat_teks' => 'nullable|string',
            'gmaps_iframe' => 'nullable|string',
            'deskripsi_footer' => 'nullable|string',
            'link_instagram' => 'nullable|string',
            'show_instagram' => 'nullable|boolean',
            'link_youtube' => 'nullable|string',
            'show_youtube' => 'nullable|boolean',
            'link_twitter' => 'nullable|string',
            'show_twitter' => 'nullable|boolean',
            'link_facebook' => 'nullable|string',
            'show_facebook' => 'nullable|boolean',
            'link_whatsapp' => 'nullable|string',
            'show_whatsapp' => 'nullable|boolean',
        ]);

        // Temukan konfigurasi berdasarkan ID atau buat baru jika tidak ada
        $configuration = Configuration::find($request->input('id')) ?? new Configuration;

        // Fungsi untuk mengunggah file dan menyimpan nama file ke database
        $configuration->logo = $this->uploadFile($request, 'logo', $configuration->logo, 'public/configuration');
        $configuration->favicon = $this->uploadFile($request, 'favicon', $configuration->favicon, 'public/configuration');

        // Update semua data kecuali logo, favicon, dan _token
        $configuration->fill($request->except(['logo', 'favicon', '_token']));

        // Simpan ke database
        $configuration->save();

        return redirect()->route('configuration.index')->with('success', 'Data konfigurasi berhasil disimpan.');
    }

    // Fungsi untuk mengelola upload file
    private function uploadFile($request, $fieldName, $currentFile, $storagePath)
    {
        if ($request->hasFile($fieldName)) {
            // Hapus file lama jika ada
            if ($currentFile) {
                Storage::delete($storagePath . '/' . $currentFile);
            }

            // Simpan file baru
            $file = $request->file($fieldName);
            $fileName = time() . '_' . $fieldName . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storagePath, $fileName);

            return $fileName;
        }

        // Kembalikan nama file lama jika tidak ada file baru yang diunggah
        return $currentFile;
    }
}
