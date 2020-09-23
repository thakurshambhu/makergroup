<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->string('title');
            $table->string('subtitle');
            $table->longtext('description');
            $table->string('keyfeature1');
            $table->string('keyfeature2');
            $table->string('keyfeature3');
            $table->string('keyfeature4');
            $table->string('client_quote');
            $table->enum('status',['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('detail_pages');
    }
}
