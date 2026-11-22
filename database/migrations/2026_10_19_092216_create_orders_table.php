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
            $table->string('voucher_no');
            $table->decimal('total',10,2);
            $table->string('qty');
            $table->string('payment_slip'); 
            $table->string('status');
            $table->string('note');  
            
            $table->unsignedBigInteger('item_id')
            ->references('id')
            ->on('items')
            ->onDelete('cascade');

            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')
            ->references('id')
            ->on('payments')
            ->onDelete('cascade');
            $table->timestamps();
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
