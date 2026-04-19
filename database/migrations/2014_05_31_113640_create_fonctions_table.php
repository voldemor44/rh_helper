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
        Schema::create('fonctions', function (Blueprint $table) {
         #   $table->id();
         $table->uuid('id')->primary();
            $table->string('nom');
           # $table->foreignId('departement_id')->constrained();
           $table->uuid('departement_id')->index();
           $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');

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
        Schema::dropIfExists('fonctions');
        Schema::table('fonctions', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
        });
    }
};
