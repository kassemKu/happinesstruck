<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191)->unique();
            $table->string('en_name', 191)->unique();
            $table->string('ar_slug', 200)->nullable();
            $table->string('en_slug', 200)->nullable();
            $table->enum('status',['available','unavailable'])->default('available');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained();
            $table->foreignId('city_id')
                ->nullable()
                ->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
