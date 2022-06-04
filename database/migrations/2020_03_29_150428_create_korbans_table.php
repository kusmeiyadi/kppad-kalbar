<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelapor_id');
            $table->string('nama_k');
            $table->enum('jk_k', ['Pria', 'Wanita'])->nullable();
            $table->enum('agama_k', ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Budha', 'Konghucu', 'Bahai', 'Kepercayaan Lainnya'])->nullable();
            $table->string('status')->nullable();
            $table->text('alamat_k')->nullable();
            $table->integer('usia_k')->nullable();
            $table->string('kewarganegaraan_k')->nullable();
            $table->timestamps();

            $table->foreign('pelapor_id')->references('id')->on('pelapors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('korbans');
    }
}
