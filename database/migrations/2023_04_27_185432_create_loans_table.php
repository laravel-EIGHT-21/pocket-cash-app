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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('student_acct_no')->nullable();
            $table->double('loan_amount')->nullable();
            $table->string('loan_date')->nullable();
            $table->string('loan_month')->nullable();
            $table->string('loan_year')->nullable();
            $table->double('loan_payment_amount')->nullable();
            $table->string('loan_payment_date')->nullable();
            $table->string('loan_payment_month')->nullable();
            $table->string('loan_payment_year')->nullable();
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
        Schema::dropIfExists('loans');
    }
};
