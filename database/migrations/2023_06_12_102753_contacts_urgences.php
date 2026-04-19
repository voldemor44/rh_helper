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
        Schema::create('contacts_urgences', function (Blueprint $table) {
         #   $table->id();
         $table->uuid('id')->primary();
         #   $table->foreignId('user_id')->constrained();
         $table->uuid('user_id')->index();
         $table->foreign('user_id')->references('id')->on('projets')->onDelete('cascade');

            $table->string('nom')->nullable();
            $table->string('relation')->nullable();
            $table->string('telephone')->nullable();
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
        //
    }
};
