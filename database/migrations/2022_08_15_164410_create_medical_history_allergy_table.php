<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoryAllergyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_history_allergy', function (Blueprint $table) {
            $table->id('mha_id');
            $table->boolean('mha_food');
            $table->string('mha_food_specify');
            $table->boolean('mha_medicine');
            $table->string('mha_medicine_specify');
            $table->boolean('mha_others');
            $table->string('mha_others_specify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_history_allergy');
    }
}
