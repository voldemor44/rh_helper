<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces_jointes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('path');
           # $table->foreignId('fiches_remplie_id')->constrained();
           $table->uuid('fiches_remplie_id')->index();
           $table->foreign('fiches_remplie_id')->references('id')->on('fiches_remplies')->onDelete('cascade');

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
        Schema::dropIfExists('pieces_jointes');
    }
};
