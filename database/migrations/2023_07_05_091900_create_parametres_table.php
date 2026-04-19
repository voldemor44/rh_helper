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
        Schema::create('parametres', function (Blueprint $table) {
           # $table->id();
           $table->uuid('id')->primary();
            $table->string('nom');
            $table->string('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->string('etat')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->string('fax')->nullable();
            $table->string('siteWeb');
            
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
        Schema::dropIfExists('parametres');
    }
};
