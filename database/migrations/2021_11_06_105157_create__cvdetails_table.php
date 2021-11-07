<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvdetails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('date');
            $table->string('email')->unique();
            $table->string('nation');
            $table->string('gender');
            $table->string('file');
            $table->string('address');
            $table->longText('about');
            $table->longText('projects');
            $table->string('collegeName');
            $table->string('intermediate'); 
            $table->string('intermediatestart');
            $table->string('intermediateend');
            $table->string('Universtyname');
            $table->string('Bachelor');
            $table->string('Universtystart');
            $table->string('Universtyend');
            $table->string('Company');
            $table->longText('Designation');
            $table->longText('Skills');
            $table->integer('created_by')->onDelete('set null');
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
        Schema::dropIfExists('_cvdetails');
    }
}
