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
            $table->string('event_title', 191);
            $table->string('event_location', 191);
            $table->longText('event_description')->nullable();
            $table->string('slug', 200)->unique()->nullable();
            $table->decimal('price');
            $table->date('date')->nullable();
            $table->string('time')->nullable();
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
