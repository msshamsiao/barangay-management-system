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
        Schema::create('address_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->string('street_address');
            $table->string('nationality');
            $table->timestamps();

            $table->foreign('resident_id')->references('id')->on('personal_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address_details', function (Blueprint $table) {
            $table->dropColumn(['street_address', 'nationality', 'blood_type']);
        });
    }
};
