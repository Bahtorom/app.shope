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
            $table->string('generation')->nullable();  // 17
            $table->string('variant')->nullable();    // Pro Max
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0); //Остаток на складе 
            $table->string('image')->nullable();
            $table->timestamps();
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
