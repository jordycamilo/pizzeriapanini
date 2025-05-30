<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pizza_id', )->references('id')->on('pizzas')->onDelete('cascade');
            $table->foreignId('ingredient_id', )->references('id')->on('ingredients')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredients');
    }
};
