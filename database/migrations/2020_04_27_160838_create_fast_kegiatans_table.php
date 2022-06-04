<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFastKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_kegiatans', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->string('color');
          $table->time('start');
          $table->time('end');
          $table->timestamps();

          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fast_kegiatans');
    }
}
