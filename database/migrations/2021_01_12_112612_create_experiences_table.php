<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('profession')->nullable();
            $table->string('company')->nullable();
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->text('description')->nullable();
            //$table->bigInteger('user_id');
           
           // $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('experiences', function(Blueprint $table){    
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
        Schema::dropIfExists('experiences');
    }
}
