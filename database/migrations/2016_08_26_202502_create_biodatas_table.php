<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('nama');
            $table->string('no_telp', 20);
            $table->string('bday_dd', 2);
            $table->string('bday_mm', 2);
            $table->string('bday_yy', 4);
            $table->string('jenis_kelamin', 1);
            $table->text('bio');
            $table->string('avatar');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('biodatas');
    }
}
