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
        Schema::create('educational_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->string('educational_attainment');
            $table->string('school_attended');
            $table->string('course_taken');
            $table->year('year_graduated');
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
        Schema::table('educational_details', function (Blueprint $table) {
            $table->dropColumn(['educational_attainment', 'school_attended', 'course_taken', 'year_graduated']);
        });
    }
};
