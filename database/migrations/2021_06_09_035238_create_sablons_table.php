<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSablonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sablons', function (Blueprint $table) {
            $table->id();
            $table->integer('tipes_id');
            $table->string('nama');
            $table->integer('nohp');
            $table->integer('jumlah');
            $table->integer('uang_dp');
            $table->integer('total');
            $table->integer('kurang');
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
        Schema::dropIfExists('sablons');
    }
}
