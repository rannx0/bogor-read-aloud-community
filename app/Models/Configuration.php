<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model secara konvensional
    protected $table = 'configurations'; // Ganti sesuai nama tabel Anda

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'name_instansi', 'footer_name', 'logo', 'favicon', 'no_hp',
        'email', 'alamat_teks', 'gmaps_iframe', 'deskripsi_footer',
        'link_instagram', 'show_instagram', 'link_youtube', 'show_youtube',
        'link_twitter', 'show_twitter', 'link_facebook', 'show_facebook',
        'link_whatsapp', 'show_whatsapp'
    ];

    
}
