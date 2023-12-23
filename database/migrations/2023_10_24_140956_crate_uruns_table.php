<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uruns', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temalarims')->onDelete('cascade');
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->string('urun_resmi');
            $table->string('urun_adi');
            $table->longText('urun_icerik');
            $table->string('fiyat');
            $table->string('ek_ad')->nullable();
            $table->longText('ek_icerik')->nullable();
            $table->integer('sira');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
