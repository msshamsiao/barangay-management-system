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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->string('telephone_number', 20);
            $table->string('mobile_number', 20);
            $table->string('email')->nullable();
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
        Schema::table('contact_information', function (Blueprint $table) {
            $table->dropColumn(['telephone_number', 'mobile_number', 'email']);
        });
    }
};
