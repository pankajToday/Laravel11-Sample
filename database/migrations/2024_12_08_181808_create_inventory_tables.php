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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->date('purchase_date')->nullable();
            $table->enum('quantity_type' ,[ 'kg', 'gram', 'liter','ml',  'piece',  'dozen', 'box','pack',"other"])->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->decimal('base_price',2)->default(0);
            $table->decimal('mrp_price',2)->default(0);
            $table->decimal('sale_price',2)->default(0);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->decimal('discount_amt',2)->nullable();
            $table->string('tax_type')->nullable();
            $table->string('tax_rate')->nullable();
            $table->decimal('tax_amt')->nullable();
            $table->enum('status' ,['in-stock','out-stock','expired','damaged','returned','ordered'])->nullable();
            $table->string('code_type')->nullable();
            $table->string('code_number')->nullable();
            $table->date('expiry_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
