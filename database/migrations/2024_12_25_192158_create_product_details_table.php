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
        //todo alter  table name Porduct_items
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->constrained()->cascadeOnDelete();
            $table->enum('unit' ,[ 'kg', 'gram', 'liter','ml','tin',  'piece',  'dozen', 'box','pack',"other"])->nullable();
            $table->string('unit_size',10)->index();
            $table->unsignedInteger('min_stock_hold')->default(1);
            $table->unsignedInteger('max_stock_hold')->default(10);
            $table->decimal('base_price',2)->default(0);
            $table->decimal('mrp_price',2)->default(0);
            $table->decimal('sale_price',2)->default(0);
            $table->string('discount_id')->nullable();
            $table->decimal('discount_amt',2)->nullable();
            $table->string('tax_type')->nullable();
            $table->string('tax_rate')->nullable();
          

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
