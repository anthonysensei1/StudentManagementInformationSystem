<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('upload_image_name');
            $table->text('id_no');
            $table->text('lrn');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('address');
            $table->date('b_date');
            $table->integer('age');
            $table->integer('gender');
            $table->foreignId('grade_level');
            $table->foreignId('section');
            $table->string('p_first_name')->nullable();
            $table->string('p_middle_name')->nullable();
            $table->string('p_last_name')->nullable();
            $table->text('contact_number')->nullable();
            $table->string('email_add')->nullable();
            $table->integer('status')->default(1);
            $table->integer('balance')->default(0);
            $table->integer('nso')->default(0);
            $table->integer('e_form')->default(0);
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
        Schema::dropIfExists('students');
    }
}
