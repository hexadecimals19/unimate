<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id'); // Primary key for profiles table
            $table->unsignedInteger('user_id'); // Foreign key to reference the users table

            // Basic user profile information
            $table->string('bio')->nullable(); // Bio information
            $table->string('nationality')->nullable(); // Nationality information
            $table->string('home')->nullable(); // Home address or location
            $table->unsignedInteger('age')->nullable(); // Age of the user

            // User interests
            $table->string('interest1')->nullable(); // Interest 1
            $table->string('interest2')->nullable(); // Interest 2
            $table->string('interest3')->nullable(); // Interest 3

            // User lifestyle information
            $table->string('lifestyle1')->nullable(); // Lifestyle 1
            $table->string('lifestyle2')->nullable(); // Lifestyle 2
            $table->string('lifestyle3')->nullable(); // Lifestyle 3

            // User preferences
            $table->string('pref1')->nullable(); // Preference 1
            $table->string('pref2')->nullable(); // Preference 2
            $table->string('pref3')->nullable(); // Preference 3
            $table->string('pref4')->nullable(); // Preference 4
            $table->string('pref5')->nullable(); // Preference 5

            // Additional attributes
            $table->date('date_of_birth')->nullable(); // Date of birth

            $table->timestamps(); // Created at and Updated at timestamps

            // Foreign key constraint linking profile to user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
