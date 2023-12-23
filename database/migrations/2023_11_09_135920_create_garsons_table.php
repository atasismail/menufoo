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
        Schema::create('garsons', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temalarims')->onDelete('cascade');
            $table->string('garson_adi');
            $table->string('garson_id');
            $table->string('masa_id');
            $table->longText('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garsons');
    }
};
