<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModuleAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_module_accesses', function (Blueprint $table) {
            $table->integer('user_role_id')->unsigned(); 
            $table->integer('user_module_id')->unsigned();
            $table->integer('show')->default(1); 
            $table->timestamps();

            $table->primary(['user_role_id', 'user_module_id']);
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onCascade('delete'); 
            $table->foreign('user_module_id')->references('id')->on('user_modules')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_module_accesses');
    }
}
