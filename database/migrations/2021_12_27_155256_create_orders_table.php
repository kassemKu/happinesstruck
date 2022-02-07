<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->enum('status', ['pending','processing','completed','decline'])->default('pending');
            $table->float('grand_total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['credit','payzah'])->default('payzah');

            $table->string('shipping_full_name');
            $table->string('shipping_address');
            $table->string('shipping_country');
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state');
            $table->string('shipping_area')->nullable();
            $table->string('shipping_avenue');
            $table->string('shipping_street');
            $table->string('shipping_zip_code');
            $table->string('shipping_phone');
            $table->string('notes')->nullable();

            $table->string('billing_full_name');
            $table->string('billing_country');
            $table->string('billing_state');
            $table->string('billing_city')->nullable();
            $table->string('billing_area')->nullable();
            $table->string('billing_avenue');
            $table->string('billing_street');
            $table->string('billing_address');
            $table->string('billing_zip_code');
            $table->string('billing_phone');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained();

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
}
