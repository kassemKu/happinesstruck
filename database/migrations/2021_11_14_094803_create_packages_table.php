<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191);
            $table->string('en_name', 191);
            $table->string('ar_slug', 200)->unique()->nullable();
            $table->string('en_slug', 200)->unique()->nullable();
            $table->longText('ar_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->mediumText('ar_short_description')->nullable();
            $table->mediumText('en_short_description')->nullable();
            $table->decimal('price_per_event')->default(0.00);
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
        Schema::dropIfExists('packages');
    }
}
