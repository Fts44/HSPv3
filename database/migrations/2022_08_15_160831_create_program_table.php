<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id('prog_id');
            $table->string('prog_code');
            $table->string('prog_name');
            $table->string('dept_id');
        });

        DB::table('program')->insert([
            [
                'prog_id' => '1',
                'prog_code' => 'BSIT',
                'prog_name' =>  'BS Information Technology',
                'dept_id' => '1'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}
