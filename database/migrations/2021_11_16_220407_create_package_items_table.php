<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191);
            $table->string('en_name', 191);
            $table->string('ar_slug', 200)->unique()->nullable();
            $table->string('en_slug', 200)->unique()->nullable();
            $table->decimal('price_per_event');
            $table->longText('ar_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->mediumText('ar_short_description')->nullable();
            $table->mediumText('en_short_description')->nullable();
            $table->string('SKU', 200);
            $table->enum('stock_status', ['in_stock', 'out_stock', 'low_in_stock'])->nullable();
            $table->boolean('featured')->default(false)->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->unsignedInteger('quantity_per_package')->default(0)->nullable();
            $table->unsignedInteger('quantity_per_booking')->default(0)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->json('mediaIds')->nullable();

            $table->foreignId('package_id')
                ->nullable()
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
        Schema::dropIfExists('package_items');
    }
}
