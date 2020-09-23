<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title1');
            $table->string('title2');
            $table->string('title3');
            $table->longText('description1');
            $table->longText('description2');
            $table->longText('description3');
            $table->enum('status',['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('static_pages');
    }
}
