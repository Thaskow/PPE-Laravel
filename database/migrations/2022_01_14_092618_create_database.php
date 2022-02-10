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
            $table->date('dateEvenement');
            $table->string('lieuEvenement');
            $table->date('dateReunion');
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
            $table->foreignId('image_id')->nullable()->constrained();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable();
            $table->boolean('isAdmin')->default(0);
            $table->boolean('isFirst')->default(0);
            $table->foreignId('promotion_id')->nullable()->constrained();
        });
        Schema::create('evenement_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('evenement_id')->constrained();
            $table->primary(["evenement_id","user_id"]);
            $table->boolean('isDon');
            $table->dateTime('datePassage');
            $table->boolean('isPrimoDonneur')->nullable();
            $table->boolean('isMoelle')->nullable();
        });
        Schema::create('evenement_promotion', function (Blueprint $table) {
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
