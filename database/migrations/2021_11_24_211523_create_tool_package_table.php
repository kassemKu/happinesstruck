<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price');
            $table->integer('quantity');
            $table->foreignId('package_id')
                ->nullable()
                ->constrained();
            $table->foreignId('tool_id')
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
        Schema::dropIfExists('tools_package');
    }
}
