<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('admin_tel')->nullable();
            $table->string('school_tel1')->nullable();
            $table->string('school_tel2')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_id_no')->nullable();
            $table->string('school_logo_path', 2048)->nullable();
            $table->string('student_code')->nullable();
            $table->string('student_pincode')->nullable();
            $table->string('school_std_code')->nullable();
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>Admin, 1=>School, 2=>Student */
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
