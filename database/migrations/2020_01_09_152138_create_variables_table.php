<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variables',50)->nullable();
            $table->string('take_give_status',10)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('take_value',100)->nullable();
            $table->string('take_cost',100)->nullable();
            $table->string('give_cost',100)->nullable();
            $table->string('give_value',100)->nullable();
            $table->string('your_breakpoint',200)->nullable();
            $table->string('their_breakpoint',200)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('variables');
    }
}
