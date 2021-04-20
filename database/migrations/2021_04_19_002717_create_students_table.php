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
            $table->string('nisn', 10)->unique();
            $table->string('nis', 8)->unique();
            $table->string('name', 40);
            $table->date('birthdate');
            $table->enum('gender', [0, 1]);
            $table->text('address');
            $table->string('phone_number', 14);
            $table->unsignedBigInteger('fee_id');
            $table->unsignedBigInteger('class_id');
            $table->string('password');
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes')->cascadeOnDelete();
            $table->foreign('fee_id')->references('id')->on('fees')->cascadeOnDelete();
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
