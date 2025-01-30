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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('particular_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->decimal('price',8,2)->default(0);
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('sub_total',8,2)->default(0);
            $table->string('tax',20)->nullable();
            $table->decimal('tax_rate',8,2)->default(0);
            $table->decimal('tax_amount',8,2)->default(0);
            $table->decimal('net_amount',8,2)->default(0);
            $table->enum('payment_mode',['cash','card','online','upi']);
            $table->timestamp('payment_date');
            $table->enum('status' , ['success','failed','canceled','due','pending']);
            $table->text('summery' )->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
