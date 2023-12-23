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
        Schema::create('temalarims', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tel_no');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('firma_id')->nullable();
            $table->bigInteger('tema_id');
            $table->longText('telegram_token');
            $table->longText('referans_kod');
            $table->longText('ana_referans_kod');
            $table->longText('urun_referans_kod');
            $table->longText('kisi_referans_kod');
            $table->integer('deneme_gun_sayisi');
            $table->dateTime('deneme_baslangic_tarihi');
            $table->dateTime('deneme_bitis_tarihi');
            $table->dateTime('olusturma_tarihi');
            $table->dateTime('baslangic_tarihi');
            $table->string('periyot');
            $table->string('plan_adi');
            $table->enum('active', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temalarims');
    }
};
