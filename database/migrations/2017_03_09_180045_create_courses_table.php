<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('title');
            $table->string('track');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('price')->default('free');
            $table->string('link')->nullable();
            $table->string('address')->nullable();            
            $table->string('phone')->nullable();  
            $table->integer('capacity')->unsigned();          
            $table->string('brief');            
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
        Schema::dropIfExists('courses');
    }
}
