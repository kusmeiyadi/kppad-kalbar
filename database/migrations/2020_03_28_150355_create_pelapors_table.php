<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelapors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_p');
            $table->string('identitas_p')->nullable();
            $table->enum('jk_p', ['Pria', 'Wanita'])->nullable();
            $table->enum('agama_p', ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Budha', 'Konghucu', 'Bahai', 'Kepercayaan Lainnya'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kewarganegaraan_p')->nullable();
            $table->string('kontak_p')->nullable();
            $table->text('alamat_p')->nullable();
            $table->string('relasi_p')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelapors');
    }
}
