<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technologies', function (Blueprint $table){ 
            $table->dropForeign('categorie_id');
            $table->dropColumn('categorie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          $table->unsignedInteger('categories_id')->nullable();

          $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
    }
}