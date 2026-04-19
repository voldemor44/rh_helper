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
        Schema::create('users', function (Blueprint $table) {
           # $table->id();
           $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('telephone')->unique();
            $table->dateTime('date_naissance');
            $table->foreignId('statut_utilisateur_id')->constrained();
           # $table->foreignId('departement_id')->constrained();
            #$table->foreignId('fonction_id')->constrained();
            #$table->foreignId('entreprise_id')->constrained();

            $table->uuid('departement_id')->nullable();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');

            $table->uuid('fonction_id')->nullable();
            $table->foreign('fonction_id')->references('id')->on('fonctions')->onDelete('cascade');

            $table->uuid('entreprise_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};
