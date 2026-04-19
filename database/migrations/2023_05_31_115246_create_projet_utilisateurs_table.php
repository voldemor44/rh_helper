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
        Schema::create('projet_utilisateurs', function (Blueprint $table) {
            $table->id();
           # $table->foreignId('user_id')->constrained();
           $table->uuid('user_id')->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           # $table->foreignId('projet_id')->constrained();

           $table->uuid('projet_id')->index();
           $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');


            $table->string('type_membre')->nullable();
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
        Schema::dropIfExists('projet_utilisateurs');
        Schema::table('projet_utilisateurs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['projet_id']);
        });
    }
};
