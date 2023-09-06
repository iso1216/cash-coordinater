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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('num_of');
            $table->BigInteger('goods_id')->unsigned();
            $table->BigInteger('cash_id')->unsigned();
            $table->foreign('goods_id')->references('id')->on('goods');
            $table->foreign('cash_id')->references('id')->on('cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
