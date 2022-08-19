<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoryPubertalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_history_pubertal', function (Blueprint $table) {
            $table->id('mhp_id');
            $table->integer('mhp_male_age_on_set');
            $table->integer('mhp_female_menarche');
            $table->date('mhp_female_lmp');
            $table->boolean('mhp_female_dysmenorhea');
            $table->boolean('mhp_femaile_dysmenorhea_medicine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_history_pubertal');
    }
}
