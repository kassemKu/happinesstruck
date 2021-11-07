<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('ar_slug')->unique();
            $table->text('ar_description')->nullable();
            $table->string('en_title');
            $table->string('en_slug')->unique();
            $table->text('en_description')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('banners');
    }
}
