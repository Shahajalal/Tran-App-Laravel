<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supportslists', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('password');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('mobile');
            $table->string('national_id');
            $table->string('occupation');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->integer('status');
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
        Schema::dropIfExists('supportslist');
    }
}
