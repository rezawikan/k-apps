<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technology_type_id')->unsigned();
            $table->integer('distribution_target_id')->unsigned();
            $table->integer('multiplier');
            $table->timestamps();

            $table->foreign('technology_type_id')->references('id')->on('technology_types');
            $table->foreign('distribution_target_id')->references('id')->on('distribution_targets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technology_rules');
    }
}
