<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe');
            $table->integer('nilai'); # persentase atau nilai real
            $table->bigInteger('jumlah');
            $table->text('ket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo');
    }
}
