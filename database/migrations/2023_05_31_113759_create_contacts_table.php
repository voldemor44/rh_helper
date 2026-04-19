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
        Schema::create('contacts', function (Blueprint $table) {
            #$table->id();
            $table->uuid('id')->primary();
            $table->string('nom');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('fonction');
            $table->string('Entreprise');
            $table->foreignId('type_contact_id')->constrained();
          #  $table->foreignId('entreprise_id')->constrained();
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
        Schema::dropIfExists('contacts');
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['type_contact_id']);
        });


    }
};
