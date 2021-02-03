<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_nodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_types_id')->references('id')->on('content_types');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('content_nodes');
    }
}
