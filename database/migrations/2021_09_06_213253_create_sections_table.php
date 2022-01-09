<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_name', 191)->unique();
            $table->string('en_name', 191)->unique();
            $table->text('en_description')->nullable();
            $table->text('ar_description')->nullable();
            $table->tinyInteger('published')->default('1');
            $table->string('ar_slug', 191);
            $table->string('en_slug', 191);
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
        Schema::dropIfExists('sections');
    }
}
