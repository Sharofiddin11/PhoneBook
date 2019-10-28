<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOtdel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otdel', function (Blueprint $table) {
            $table->bigIncrements('id');
			 $table->text('name')->comment("Название отдела сотрудника");
			 $table->text('name_deper')->comment("Название отдела сотрудника");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otdel');
    }
}
