<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191);
            $table->string('en_name', 191);
            $table->string('slug', 200)->unique();
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->longText('ar_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->text('ar_short_description')->nullable();
            $table->text('en_short_description')->nullable();
            $table->string('SKU', 200);
            $table->enum('stock_status', ['in_stock', 'out_stock', 'low_in_stock']);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->integer('review')->nullable();
            $table->tinyInteger('published')->default('1');

            $table->foreignId('category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
