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
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pizza_id',)->references('id')->on('pizzas')->onDelete('cascade');
            $table->foreignId('ingredient_id',)->references('id')->on('ingredients')->onDelete('cascade');
           /* $table->unsignedBigInteger('pizzas_id');
            $table->foreign('pizzas_id',)->references('id')->on('pizzas')->onDelete('cascade');
            $table->unsignedBigInteger('ingredients_id');
            $table->foreign('ingredients_id',)->references('id')->on('ingredients')->onDelete('cascade');
        */
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredient');
    }
};
