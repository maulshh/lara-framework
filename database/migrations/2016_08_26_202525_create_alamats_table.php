<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('negara', 4)->default('id');
            $table->string('nama_alamat', 40);
            $table->string('provinsi', 40);
            $table->string('kota', 40);
            $table->string('kecamatan', 50);
            $table->string('alamat');
            $table->string('nama_penerima');
            $table->string('no_telp');
            $table->string('kode_pos');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('alamats');
    }
}
