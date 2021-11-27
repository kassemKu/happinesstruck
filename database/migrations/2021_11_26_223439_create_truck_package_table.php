<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price');
            $table->integer('quantity');
            $table->foreignId('truck_id')
                ->nullable()
                ->constrained();
            $table->foreignId('package_id')
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
        Schema::dropIfExists('truck_package');
    }
}
