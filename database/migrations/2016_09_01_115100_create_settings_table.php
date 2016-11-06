<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('placeholder');
            $table->integer('number')->nullable();
            $table->date('date')->nullable();
            $table->string('string')->nullable();
            $table->text('text')->nullable();
            $table->string('type', 40)->default('text');
            $table->unique(['name', 'module', 'boot']);
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
        Schema::drop('settings');
    }
}
