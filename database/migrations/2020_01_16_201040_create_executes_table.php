<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExecutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variables',50)->nullable();
            $table->string('status',10)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('aligned',100)->nullable();
            $table->string('who',20)->nullable();
            $table->string('what',20)->nullable();
            $table->string('when',20)->nullable();
            $table->integer('offer_length')->nullable();
            $table->text('offer',1000)->nullable();
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
        Schema::dropIfExists('executes');
    }
}
