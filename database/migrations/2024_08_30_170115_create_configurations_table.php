<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name_instansi')->nullable();
            $table->string('footer_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat_teks')->nullable();
            $table->text('gmaps_iframe')->nullable();
            $table->text('deskripsi_footer')->nullable();
            $table->string('link_instagram')->nullable();
            $table->boolean('show_instagram')->default(true);
            $table->string('link_youtube')->nullable();
            $table->boolean('show_youtube')->default(true);
            $table->string('link_twitter')->nullable();
            $table->boolean('show_twitter')->default(true);
            $table->string('link_facebook')->nullable();
            $table->boolean('show_facebook')->default(true);
            $table->string('link_whatsapp')->nullable();
            $table->boolean('show_whatsapp')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
