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
        Schema::create('school_fees_collections', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('student_acct_no')->nullable();
            $table->string('school_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('externalId')->nullable();
            $table->string('payee_number')->nullable();
            $table->string('status')->nullable();
            $table->string('transfer_date')->nullable();
            $table->string('transfer_month')->nullable();
            $table->string('transfer_year')->nullable();
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
        Schema::dropIfExists('school_fees_collections');
    }
};
