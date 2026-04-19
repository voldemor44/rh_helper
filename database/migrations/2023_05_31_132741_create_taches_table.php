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
        Schema::create('taches', function (Blueprint $table) {
          #  $table->id();
          $table->uuid('id')->primary();
            $table->string('titre');
            $table->longText('contenu');
            $table->string('priorite');
            $table->string('statut');
            $table->date('date_delai');
           # $table->foreignId('projet_id')->constrained();
           $table->uuid('projet_id')->index();
           $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');

           $table->uuid('user_id')->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           $table->uuid('entreprise_id')->index();
           $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');

         #   $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('taches');
        Schema::table('taches', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
