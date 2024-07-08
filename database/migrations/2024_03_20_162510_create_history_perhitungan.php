<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('history_deteksi', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pasien');
        $table->string('jenis_kelamin');
        $table->integer('usia')->unsigned();
        $table->string('hasil');
        $table->enum('berat_badan', ['Yes', 'No']);
        $table->enum('demam', ['Yes', 'No']);
        $table->enum('malaise', ['Yes', 'No']);
        $table->enum('keringat_malam', ['Yes', 'No']);
        $table->enum('nyeri_dada', ['Yes', 'No']);
        $table->enum('nafsu_makan', ['Yes', 'No']);
        $table->enum('sesak_nafas', ['Yes', 'No']);
        $table->enum('batuk', ['Yes', 'No']);
        $table->unsignedBigInteger('id_akun');
        $table->timestamps();
    });

    // Add the check constraint for usia >= 12
    DB::statement('ALTER TABLE history_deteksi ADD CONSTRAINT check_usia CHECK (usia >= 13)');
}

public function down(): void
{
    Schema::table('history_deteksi', function (Blueprint $table) {
        $table->dropColumn('usia');
    });

    Schema::dropIfExists('history_deteksi');
}

 /**
     * Reverse the migrations.
     */
   

};
