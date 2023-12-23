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
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->dateTime("abone_baslangic_tarihi")->nullable();
            $table->dateTime("abone_bitis_tarihi")->nullable();
            $table->string('displayName');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->bigInteger('tel_no')->unique()->nullable();
            $table->bigInteger('tel_dogrulama_kod')->nullable();
            $table->bigInteger('tc_no')->nullable();
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->longText('adres')->nullable();
            $table->enum('tel_active', [1, 0])->default(0);
            $table->string('apiToken', 60)->unique();
            $table->string('userId')->unique()->nullable();
            $table->string('user_file')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('active', [1, 0])->default(1);
            $table->string('rol');
            $table->rememberToken();
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
