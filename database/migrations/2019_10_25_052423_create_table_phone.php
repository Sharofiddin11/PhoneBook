<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->text('name');
			$table->text('phone_number')->nullable()->comment('мобильный');
			$table->string('email')->unique()->comment("Емайл сотрудника");
			$table->text('address')->comment("Адрес сотрудника");
			$table->text('Dep_name');
			$table->text('otd_name');
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
        Schema::dropIfExists('phone');
    }
}
