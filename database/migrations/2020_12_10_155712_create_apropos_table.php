<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAproposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('apropos', function (Blueprint $table) {
            $table->id();

            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissance');
            $table->string('nationalite');
            $table->string('statut_de_travail');
            $table->longtext('bio');
            $table->string('tel');
            $table->string('email');
            $table->string('addresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('disponibilite');
            $table->text('photo_profil');

           
            $table->unsignedBigInteger('user_id');
                    $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

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
        Schema::dropIfExists('apropos');
    }
}
