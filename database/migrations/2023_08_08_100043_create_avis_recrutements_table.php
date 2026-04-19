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
        Schema::create('avis_recrutements', function (Blueprint $table) {
           # $table->id();
           $table->uuid('id')->primary();
            $table->json('contenu');
          #  $table->foreignId('user_id')->constrained();

            $table->uuid('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


         #   $table->foreignId('entreprise_id')->constrained();
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
        Schema::dropIfExists('avis_recrutements');
    }
};
