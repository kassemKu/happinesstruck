<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191);
            $table->string('en_name', 191);
            $table->mediumText('en_summary')->nullable();
            $table->mediumText('ar_summary')->nullable();
            $table->tinyInteger('published')->default('1');
            $table->string('ar_slug', 191)->nullable();
            $table->string('en_slug', 191)->nullable();
            $table->json('mediaIds')->nullable();
            $table->boolean('is_parent')->default(true)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('SET NULL');
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
        Schema::dropIfExists('categories');
    }
}
