<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistributionTargetIdOnProjectTechnologyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_technology', function (Blueprint $table) {
            $table->integer('distribution_target_id')->unsigned()->index()->default();

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
        Schema::table('project_technology', function (Blueprint $table) {
            $table->dropColumn('distribution_target_id');
        });
    }
}
