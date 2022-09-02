<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryEquipmentPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_equipment_place', function (Blueprint $table) {
            $table->id('iep_id');
            $table->string('iep_place');
            $table->boolean('iep_status');
        });

        DB::table('inventory_equipment_place')->insert([
            'iep_id' => '1',
            'iep_place' => 'none',
            'iep_status' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_equipment_place');
    }
}
