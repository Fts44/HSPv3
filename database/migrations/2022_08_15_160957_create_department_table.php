<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->id('dept_id');
            $table->string('dept_code');
            $table->string('dept_name');
            $table->integer('gl_id');
        });

        DB::table('department')->insert([
            [
                'dept_id' => '1',
                'dept_code' => 'CICS',
                'dept_name' => 'College of Informatics and Computing Sciences',
                'gl_id' => '4'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
