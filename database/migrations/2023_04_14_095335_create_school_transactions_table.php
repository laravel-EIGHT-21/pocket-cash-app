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
        Schema::create('school_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('student_acct_no')->nullable();
            $table->double('acct_amount')->nullable();
            $table->string('deposite_date')->nullable();
            $table->string('deposite_month')->nullable();
            $table->string('deposite_year')->nullable();
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
        Schema::dropIfExists('school_transactions');
    }
};
