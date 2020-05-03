<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipientlists', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('mobile');
            $table->string('national_id');
            $table->string('occupation');
            $table->string('family_member');
            $table->string('monthly_income');
            $table->string('jela');
            $table->string('upojela');
            $table->string('word');
            $table->string('village');
            $table->string('house_no');
            $table->string('easy_way');
            $table->string('comment');
            $table->integer('status');
            $table->timestamp('given_date')->nullable();
            $table->string('volunteer')->nullable();
            $table->string('permanent_address');
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
        Schema::dropIfExists('recipientlists');
    }
}
