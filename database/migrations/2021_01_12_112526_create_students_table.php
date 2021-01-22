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
            $table->unsignedBigInteger('user_id')->nullable();


            $table->string('student_id',200)->nullable();
            $table->string('batch_id',100)->nullable();
            $table->string('faculty_name',200)->nullable();
            $table->string("post_apply",300)->nullable();
            $table->string("full_name",200)->nullable();
            $table->string("other_email",255)->nullable();
            $table->string("primary_number",50)->nullable();
            $table->string("secondary_number",50)->nullable();
            $table->text("post_address",200)->nullable();
            $table->string("img_path",100)->nullable();
            $table->string("cv_path",100)->nullable();
            $table->boolean("is_uploaded")->default(0);
            $table->boolean("is_build")->default(0);

            //$table->bigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');  
            $table->timestamps();
        });



        Schema::table('students', function($table)
        {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

           
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
