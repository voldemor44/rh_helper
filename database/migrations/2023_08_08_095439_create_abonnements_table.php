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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
          #  $table->foreignId('entreprise_id')->constrained();
          $table->uuid('entreprise_id')->index();
          $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');


          $table->uuid('tarif_id')->index();
          $table->foreign('tarif_id')->references('id')->on('tarifs')->onDelete('cascade');



         #   $table->foreignId('tarif_id')->constrained();
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
        Schema::dropIfExists('abonnements');
    }
};
