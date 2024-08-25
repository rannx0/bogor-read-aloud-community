<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'tema', 'tanggal_dilaksanakan', 'tanggal_akhir_pendaftaran',
        'waktu_mulai', 'waktu_selesai', 'lokasi', 'harga_tiket_masuk',
        'kegiatan', 'kuota', 'deskripsi','link_pendaftaran', 'thumbnail',
    ];

    protected $casts = [
        'tanggal_dilaksanakan' => 'datetime:Y-m-d',
        'tanggal_akhir_pendaftaran' => 'datetime:Y-m-d',
        'waktu_mulai' => 'datetime:H:i:s',
        'waktu_selesai' => 'datetime:H:i:s',
    ];

    public function mediaPartners()
    {
        return $this->hasMany(MediaPartner::class);
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }

    // Accessors
    public function getTanggalDilaksanakanAttribute($value)
    {
        return Carbon::parse($value)->format('l, d F Y');
    }

    public function getTanggalAkhirPendaftaranAttribute($value)
    {
        return Carbon::parse($value)->format('l, d F Y');
    }

    public function getWaktuMulaiAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getWaktuSelesaiAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}
