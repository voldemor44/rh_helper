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
        Schema::create('dossiers', function (Blueprint $table) {
         #   $table->id();
         $table->uuid('id')->primary();
            $table->string('title');
            $table->string('nom');
            $table->string('path');
            $table->string('format');
            $table->date('date_creation');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('pieces_jointes')->nullable();
            $table->foreignId('type_dossier_id')->nullable();
            $table->foreignId('status_dossier_id')->nullable();
          #  $table->foreignId('user_id')->nullable();
          $table->uuid('user_id')->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('dossiers');

        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropForeign(['type_dossier_id']);
            $table->dropForeign(['statut_dossier_id']);
        });
    }
};
