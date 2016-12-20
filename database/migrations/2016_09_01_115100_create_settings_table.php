<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module', 20);
            $table->string('name', 40);
            $table->string('label', 40);
            $table->boolean('boot')->default(true);
            $table->string('placeholder')->nullable();
            $table->integer('number')->nullable();
            $table->date('date')->nullable();
            $table->string('string')->nullable();
            $table->text('text')->nullable();
            $table->string('type', 40)->default('text');
            $table->unique(['name', 'boot']);
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
        Schema::dropIfExists('settings');
    }
}
