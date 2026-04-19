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
        Schema::create('departements', function (Blueprint $table) {
            # $table->id();
            $table->uuid('id')->primary();
            $table->string('nom');
            $table->uuid('entreprise_id')->index();
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');

            # $table->foreignId('entreprise_id')->constrained();
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
        Schema::dropIfExists('departements');
    }
};
