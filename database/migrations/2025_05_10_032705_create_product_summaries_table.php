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
        Schema::create('product_summaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\Product::class, 'product_id')
                ->constrained('products')
                ->onDelete('cascade');
            $table->integer('total_reviews')->default(0);
            $table->integer('total_rating')->default(0);
            $table->integer('total_selling')->default(0);
            $table->decimal('average_rating', 2, 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_summaries');
    }
};
