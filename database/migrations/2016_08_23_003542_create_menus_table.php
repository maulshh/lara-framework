<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_target', 40);
            $table->string('position', 8);
            $table->string('icon', 25)->nullable();
            $table->string('uri')->nullable();
            $table->string('title', 50)->nullable();
            $table->string('name', 40)->nullable();
            $table->string('body', 40);
            $table->string('type', 15)->default('default');
            $table->unique(['position', 'module_target']);
            $table->timestamps();
        });

        Schema::create('menu_role', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->primary(['menu_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_role');
        Schema::dropIfExists('menus');
    }
}
