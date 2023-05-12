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
        Schema::create('api_transfers', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('financialTransactionId')->nullable();
            $table->string('mobile')->nullable();
            $table->string('status')->nullable();
            $table->string('transfer_date')->nullable();
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
        Schema::dropIfExists('api_transfers');
    }
};
