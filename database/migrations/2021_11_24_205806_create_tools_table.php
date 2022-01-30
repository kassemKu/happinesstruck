<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191)->unique();
            $table->string('en_name', 191)->unique();
            $table->string('ar_slug', 200)->nullable();
            $table->string('en_slug', 200)->nullable();
            $table->decimal('price');
            $table->mediumText('ar_short_description')->nullable();
            $table->mediumText('en_short_description')->nullable();
            $table->string('SKU', 200);
            $table->enum('stock_status', ['in_stock', 'out_stock', 'low_in_stock'])->nullable()->default('in_stock');
            $table->unsignedInteger('quantity')->default(1);
            $table->enum('status',['active','inactive'])->default('active');
            $table->json('mediaIds')->nullable();

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
        Schema::dropIfExists('tools');
    }
}
