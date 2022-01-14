<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->dateTime('dateEvenement');
            $table->string('lieuEvenement');
            $table->dateTime('dateReunion');
            $table->string('lieuReunion');
            $table->timestamps();
        });
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('url');
            $table->foreignId('evenement_id')->nullable()->constrained();
            $table->timestamps();
        });
        Schema::create('contenus', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->foreignId('image_id')->constrained();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom');
            $table->boolean('isAdmin');
            $table->boolean('isPrimoDonneur');
            $table->boolean('isMoelle');
            $table->foreignId('promotion_id')->constrained();
        });
        Schema::create('user_evenement', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('evenement_id')->constrained();
            $table->primary(["evenement_id","user_id"]);
            $table->boolean('isVenir');
            $table->dateTime('datePassage');
        });
        Schema::create('promotion_evenement', function (Blueprint $table) {
            $table->foreignId('promotion_id')->constrained();
            $table->foreignId('evenement_id')->constrained();
            $table->primary(["evenement_id","promotion_id"]);
            $table->double('pourcentage');
            $table->integer('nbParticipant');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('database');
    }
}
