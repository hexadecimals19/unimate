<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('show_nationality')->default(true);
            $table->boolean('show_home')->default(true);
            $table->boolean('show_age')->default(true);
            $table->boolean('show_date_of_birth')->default(true);
        });
    }

    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['show_nationality', 'show_home', 'show_age', 'show_date_of_birth']);
        });
    }

};
