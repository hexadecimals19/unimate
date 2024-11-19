<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/YYYY_MM_DD_create_reviews_table.php
// database/migrations/2024_11_19_120420_create_reviews_table.php
// database/migrations/2024_11_19_120420_create_reviews_table.php
public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('user_id');  // Use unsignedInteger to match the users table
        $table->unsignedInteger('roommate_id');  // Use unsignedInteger to match the users table
        $table->integer('rating')->unsigned()->nullable();
        $table->text('review')->nullable();
        $table->timestamps();

        // Define foreign keys
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('roommate_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('reviews');
}

};
