<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::disableForeignKeyConstraints();

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->text('photo_projet');

            $table->unsignedBigInteger('projet_id');
                    $table->foreign('projet_id')
                        ->references('id')
                        ->on('projets')
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
        Schema::dropIfExists('experiences');
    }
}
