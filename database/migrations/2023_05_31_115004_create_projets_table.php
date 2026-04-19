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
        Schema::create('projets', function (Blueprint $table) {
          #  $table->id();
          $table->uuid('id')->primary();
            $table->string('titre')->nullable();
            $table->string('priorite')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin_prevue')->nullable();
            $table->string('chef_projet')->nullable();
            $table->text('description')->nullable();
            $table->string('statut')->default('En cours');
            $table->string('path_document')->nullable();
           # $table->foreignId('entreprise_id')->constrained();
            $table->uuid('entreprise_id')->index();
           $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');

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
        Schema::dropIfExists('projets');
    }
};
