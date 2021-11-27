<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_slug')->nullable();
            $table->string('en_slug')->nullable();
            $table->string('ar_type')->nullable();
            $table->string('en_type')->nullable();
            $table->string('size')->nullable();
            $table->text('ar_note')->nullable();
            $table->text('en_note')->nullable();
            $table->decimal('min_price_per_event')->default(0.00);
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->json('mediaIds')->nullable();
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
        Schema::dropIfExists('trucks');
    }
}
