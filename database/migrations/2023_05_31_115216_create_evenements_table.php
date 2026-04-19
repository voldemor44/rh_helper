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
        Schema::create('evenements', function (Blueprint $table) {
            #$table->id();
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('titre');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            #  $table->foreignId('user_id')->constrained();
            $table->uuid('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('type_evenement_id')->constrained();
            $table->string('category');
            // $table->dateTime('date_debut');
            // $table->dateTime('date_fin');
            $table->uuid('entreprise_id')->index();
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
