<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id',)->references('id')->on('users')->onDelete('cascade');
            $table->enum('position',['cajero','administrador','cocinero','mensajero']);
            $table->string('identification_number');
            $table->float('salary');
            $table->date('hire_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
