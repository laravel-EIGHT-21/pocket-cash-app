<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_healthfiles', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('student_acct_no');
            $table->string('title')->nullable();
            $table->text('description')->nullable(); 
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('files', 2048)->nullable();
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
        Schema::dropIfExists('student_healthfiles');
    }
};
