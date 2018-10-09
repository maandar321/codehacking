<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('status')->nullable();
            $table->date('doj')->nullable();
            $table->integer('basic_salary')->nullable();
            $table->integer('absences')->nullable();
            $table->integer('late')->nullable();
            $table->integer('other_deduction')->nullable();
            $table->integer('lunch')->nullable();
            $table->integer('tax_ded')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('total_deduction')->nullable();
            $table->integer('net_payable')->nullable();
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
