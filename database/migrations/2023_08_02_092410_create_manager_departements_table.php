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
        Schema::create('manager_departements', function (Blueprint $table) {
            $table->id();

            # $table->unsignedBigInteger('manager_id');

            $table->uuid('manager_id')->index();
            $table->foreign('manager_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // $table->unsignedBigInteger('departement_id');
            // $table->foreign('departement_id')
            //     ->references('id')
            //     ->on('departements')
            //     ->onDelete('cascade');

            $table->uuid('departement_id')->index();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
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
        Schema::dropIfExists('manager_departements');
    }
};
