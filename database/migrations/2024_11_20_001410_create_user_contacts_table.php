<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContactsTable extends Migration
{
    public function up()
    {
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('phone_number')->nullable();
            $table->boolean('show_phone_number')->default(false);
            $table->string('whatsapp')->nullable();
            $table->boolean('show_whatsapp')->default(false);
            $table->string('telegram')->nullable();
            $table->boolean('show_telegram')->default(false);
            $table->string('facebook_profile')->nullable();
            $table->boolean('show_facebook_profile')->default(false);
            $table->string('twitter_profile')->nullable();
            $table->boolean('show_twitter_profile')->default(false);
            $table->string('instagram_profile')->nullable();
            $table->boolean('show_instagram_profile')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_contacts');
    }
}
