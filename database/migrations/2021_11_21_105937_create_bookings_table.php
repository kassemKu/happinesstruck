<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('slug', 200)->unique()->nullable();
            $table->decimal('cost');
            $table->longText('description')->nullable();
            $table->date('started_at')->nullable();
            $table->date('ended_at')->nullable();
            $table->enum('status', ['pending','processing','completed','decline'])->default('pending');
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
        Schema::dropIfExists('bookings');
    }
}
