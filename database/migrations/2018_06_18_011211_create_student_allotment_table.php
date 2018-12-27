<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAllotmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_allotment', function (Blueprint $table) {
            $table->increments('student_allotment_id')->primary();
            $table->integer('term_id');
            $table->string('division');
            $table->integer('uid');
            $table->integer('roll_no');
            $table->string('batch');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_allotment');
    }
}
