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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('OrderDate');
            $table->enum('PaymentMethod', ['Przelew', 'Przy odbiorze'])->default('Przelew');
            $table->enum('DeliveryMethod', ['Kurier', 'Odbiór'])->default('Odbiór');
            $table->enum('OrderStatus',['Złożone', 'Zaakceptowane', 'W trakcie', 'Wysłane', 'Anulowane'])->default('Złożone');
            $table->date('DeliveryDate');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
