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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('brand');  //Apple
            $table->string('series');  // Iphone
            $table->string('generation')->default('');  // 17
            $table->string('variant')->default('');    // Pro Max
            $table->integer('price')->default(0);
            $table->integer('stock')->default(0); //Остаток на складе 
            $table->string('color')->default(''); //Цвет
            $table->string('memory')->default(''); //Память
            $table->text('description')->default(''); //Описание
            $table->string('image')->default(''); 
            $table->timestamps();

            $table->unique(['brand', 'series', 'generation', 'variant', 'color', 'memory']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
