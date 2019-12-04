<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer('facilitator_id');
            $table->integer('course_id');
            $table->string('location', 255);
            /**
             * Chose to make tier an integer in the db to make it easier to store info
             * We'll have to decide which numbers designate each tier and programmatically 
             * handle it
             */
            $table->integer('tier');
            $table->integer("schedule_id");
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
        Schema::dropIfExists('student_course_information');
    }
}
