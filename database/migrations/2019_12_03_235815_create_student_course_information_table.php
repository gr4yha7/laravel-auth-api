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
            $table->integer('facilitator_id')->nullable(true);
            $table->integer('course_id');
            $table->integer('tier');
            $table->enum('status', ['pending', 'ongoing', 'completed']);
            $table->string('location', 255)->nullable(true);
            /**
             * Chose to make tier an integer in the db to make it easier to store info
             * We'll have to decide which numbers designate each tier and programmatically 
             * handle it
             */
            $table->integer("schedule_id")->nullable(true);
            $table->integer('class_id')->nullable(true);
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
