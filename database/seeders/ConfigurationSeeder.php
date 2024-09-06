<?php

namespace Database\Seeders;

use App\Models\Configuration; // Pastikan namespace ini sesuai
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tentukan path ke file logo dan favicon
        $logoPath = 'img/logo3.png'; // Pastikan path ini sesuai dengan file di folder public
        $faviconPath = 'favicon.ico'; // Pastikan path ini sesuai dengan file di folder public

        // Cek apakah file ada di folder public
        if (!file_exists(public_path($logoPath))) {
            throw new \Exception("File logo tidak ditemukan di: " . public_path($logoPath));
        }

        if (!file_exists(public_path($faviconPath))) {
            throw new \Exception("File favicon tidak ditemukan di: " . public_path($faviconPath));
        }

        // Update atau buat entri konfigurasi
        Configuration::updateOrCreate(
            ['id' => 1],
            [
                'name_instansi' => 'Contoh Instansi',
                'footer_name' => 'Contoh Footer',
                'logo' => $logoPath,
                'favicon' => $faviconPath,
                'no_hp' => '123-456-7890',
                'email' => 'info@contoh.com',
                'alamat_teks' => 'Alamat contoh',
                'gmaps_iframe' => '<iframe src="..."></iframe>',
                'deskripsi_footer' => 'Deskripsi footer',
                'link_instagram' => 'https://instagram.com/contoh',
                'show_instagram' => true,
                'link_youtube' => 'https://youtube.com/contoh',
                'show_youtube' => true,
                'link_twitter' => 'https://twitter.com/contoh',
                'show_twitter' => true,
                'link_facebook' => 'https://facebook.com/contoh',
                'show_facebook' => true,
                'link_whatsapp' => 'https://wa.me/1234567890',
                'show_whatsapp' => true,
            ]
        );
    }

}
