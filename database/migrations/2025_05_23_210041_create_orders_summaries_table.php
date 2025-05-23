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
        Schema::create('orders_summaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('group_date')->unique();
            $table->integer('total_orders')->default(0);
            $table->decimal('total_incomes', 15,2)->default(0);
            $table->decimal('total_sales', 15,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_summaries');
    }
};
