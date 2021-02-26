<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalabsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalabsens', function (Blueprint $table) {
            $table->id();
            $table->String('idactivity');
            $table->String('activity');
            $table->String('day');
            $table->String('entrytime');
            $table->String('latetime');
            $table->String('timeout');
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
        Schema::dropIfExists('jadwalabsens');
    }
}
