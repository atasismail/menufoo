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
        Schema::create('seceneks', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('tema_id')->unsigned()->nullable();
            $table->foreign('tema_id')->references('id')->on('temalarims')->onDelete('cascade');
            $table->longText('metinler')->nullable();
            $table->string('yazi_hizi')->nullable();
            $table->string('yazi_silme_hizi')->nullable();
            $table->string('yazi_silme_bekleme')->nullable();
            $table->enum('yazi_dongu', [1, 0])->default(1);
            $table->string('color_text')->nullable();
            $table->string('hex_renk')->nullable();
            $table->string('ust_kutu_renk')->nullable();
            $table->string('garson_buton_renk')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seceneks');
    }
};
