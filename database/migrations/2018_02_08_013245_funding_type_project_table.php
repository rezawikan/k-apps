<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FundingTypeProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('funding_type_project', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('project_id')->unsigned();
          $table->integer('funding_type_id')->unsigned();
          $table->timestamps();
          $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
          $table->foreign('funding_type_id')->references('id')->on('funding_types')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funding_type_project');
    }
}
