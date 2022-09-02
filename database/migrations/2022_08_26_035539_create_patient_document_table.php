<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_document', function (Blueprint $table) {
            $table->id('pd_id');
            $table->string('file_name');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));  
            $table->boolean('verified')->default(0);
            $table->integer('dt_id');
            $table->integer('acc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_document');
    }
}
