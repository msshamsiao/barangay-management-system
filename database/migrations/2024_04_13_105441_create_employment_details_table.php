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
        Schema::create('employment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->string('employment_status');
            $table->string('employer_name')->nullable();
            $table->integer('family_income_monthly');
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
        Schema::table('employment_details', function (Blueprint $table) {
            $table->dropColumn(['employment_status', 'employer_name', 'family_income_monthly']);
        });
    }
};
