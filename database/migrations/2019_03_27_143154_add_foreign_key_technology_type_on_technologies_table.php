<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTechnologyTypeOnTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('technologies', function ($table) {
          $table->foreign('technology_type_id')->references('id')->on('technology_types');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('technologies', function ($table) {
          $table->dropForeign('technologies_technology_type_id_foreign');
      });
    }
}
