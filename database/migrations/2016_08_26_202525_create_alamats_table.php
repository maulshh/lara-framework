<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAlamatsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('alamats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('negara', 4)->default('id');
            $table->string('nama_alamat', 40)->nullable();
            $table->string('provinsi', 2)->nullable();
            $table->string('kota', 4)->nullable();
            $table->string('kecamatan', 7)->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_penerima', 40)->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('defaulted_to_user_id')->unsigned()->nullable()->unique();
            $table->foreign('defaulted_to_user_id')->references('id')->on('users')->onDelete('cascade');
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
    public function down() {
        Schema::drop('alamats');
    }
}
