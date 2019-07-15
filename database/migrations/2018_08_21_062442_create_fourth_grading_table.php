<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFourthGradingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fourth_grading', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('activity');
            $table->string('quiz');
            $table->string('major_exam');
            $table->string('computed_grade');
            $table->string('submitted_grade');
            $table->string('role');
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
        Schema::dropIfExists('fourth_grading');
    }
}
