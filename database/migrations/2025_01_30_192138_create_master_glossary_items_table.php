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
        Schema::create('master_glossary_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_glossary_id')->references('id')->on('master_glossaries')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->constrained()->cascadeOnDelete();
            $table->foreignId('item_id')->references('id')->on('product_details')->constrained()->cascadeOnDelete();//todo alter  table name Porduct_items
            $table->boolean('custom_unit')->default(false);
            $table->string('custom_unit_name')->nullable();
            $table->string('custom_unit_size')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('price')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_glossary_items');
    }
};
