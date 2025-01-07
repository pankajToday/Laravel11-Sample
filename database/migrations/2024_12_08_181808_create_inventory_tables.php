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
            $table->unsignedBigInteger('product_detail_id')->index();
            $table->string("vendor")->nullable()->index();
            $table->string("bill_number")->nullable()->index();
            $table->date("bill_date")->nullable();
            $table->string('batch_number', 50)->nullable()->index();
            $table->date('purchase_date')->nullable();
            $table->enum('quantity_type' ,[ 'kg', 'gram', 'liter','ml','tin',  'piece',  'dozen', 'box','pack',"other"])->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->string('code_type')->nullable();
            $table->string('code_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status' ,['in-stock','out-stock','expired','damaged','returned','ordered'])->nullable();
            
            

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
