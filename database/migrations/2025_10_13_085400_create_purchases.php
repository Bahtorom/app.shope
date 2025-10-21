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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('phone_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(0); // Количество
            $table->decimal('price_at_purchase', 10, 2);  // Цена на момент покупки
            $table->timestamp('purchased_at')->useCurrent(); // Когда куплено 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
