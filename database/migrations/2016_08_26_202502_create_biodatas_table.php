<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id')->unsigned()->primary();
            $table->string('nama');
            $table->string('no_telp', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender', 1)->nullable();
            
            $table->text('bio')->nullable();
            $table->string('avatar')->default('/images/user/default.jpg');
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
        Schema::dropIfExists('biodatas');
    }
}