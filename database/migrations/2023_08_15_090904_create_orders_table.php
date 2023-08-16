<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->decimal('product_price', 20, 3)->nullable();
            $table->decimal('order_discount_amount', 20, 3)->nullable();
            $table->foreignId('instalment_id')->nullable()->constrained('instalments')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('instalment_object')->nullable();
            $table->decimal('order_instalment_amount', 20, 3)->nullable();
            $table->integer('number')->default(1);
            $table->decimal('order_total_products_amount', 20, 3)->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
