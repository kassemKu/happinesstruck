<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price');
            $table->integer('quantity');
            $table->foreignId('package_id')
                ->nullable()
                ->constrained();
            $table->foreignId('item_id')
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
        Schema::dropIfExists('package_items');
    }
}
