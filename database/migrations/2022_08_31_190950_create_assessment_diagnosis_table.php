<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_diagnosis', function (Blueprint $table) {
            $table->id('ad_id');
            $table->boolean('ad_drinking')->default(0);
            $table->integer('ad_drinking_how_much')->nullable();
            $table->string('ad_drinking_how_often')->nullable();
            $table->boolean('ad_smoking');
            $table->integer('ad_smoking_sticks_per_day')->nullable();
            $table->integer('ad_smoking_since_when')->nullable();
            $table->boolean('ad_drug');
            $table->string('ad_drug_kind')->nullable();
            $table->boolean('ad_drug_regular_use')->nullable();
            $table->boolean('ad_driving');
            $table->string('ad_driving_specify')->nullable();
            $table->string('ad_driving_with_license')->nullable();
            $table->boolean('ad_abuse');
            $table->string('ad_abuse_specify')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_diagnosis');
    }
}
