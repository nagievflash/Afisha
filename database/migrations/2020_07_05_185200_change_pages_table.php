<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['excerpt', 'image', 'meta_keywords']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->text('meta_keywords')->nullable();
        });
    }
}
