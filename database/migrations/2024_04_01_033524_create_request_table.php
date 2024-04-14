<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('fullname');
            $table->boolean('voter');
            $table->string('address');
            $table->date('birthdate');
            $table->string('civil_status');
            $table->string('place_of_birth');
            $table->integer('age');
            $table->string('valid_id');
            $table->string('sss_no');
            $table->string('tin_no');
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
        Schema::dropIfExists('request');
    }
};
