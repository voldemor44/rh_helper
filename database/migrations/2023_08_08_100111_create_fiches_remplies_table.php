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
        Schema::create('fiches_remplies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('reponses');
           # $table->foreignId('avis_recrutement_id')->constrained();
           $table->uuid('avis_recrutement_id')->index();
           $table->foreign('avis_recrutement_id')->references('id')->on('avis_recrutements')->onDelete('cascade');

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
        Schema::dropIfExists('fiches_remplies');
    }
};
