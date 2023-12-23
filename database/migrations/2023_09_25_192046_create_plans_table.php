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
        Schema::create('plans', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->longText('referans_kod');
            $table->string('plan_adi');
            $table->string('fiyat');
            $table->string('fiyat_cinsi');
            $table->string('periyot');
            $table->string('periyot_sure_sayisi');
            $table->string('deneme_gun_sayisi');
            $table->integer('sira_numarasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
