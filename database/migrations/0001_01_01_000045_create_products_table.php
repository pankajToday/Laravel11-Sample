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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku',30)->index();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('name',30);
            $table->string('slug',30)->index();
            $table->string('type',30)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('min_stock_hold')->default(1);
            $table->unsignedInteger('max_stock_hold')->default(5000);
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('type',30)->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
    }
};