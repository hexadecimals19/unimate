<?php

// database/migrations/xxxx_xx_xx_create_roommate_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoommateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('roommate_applications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('applicant_id'); // Foreign key to the applicant (user applying)
            $table->unsignedBigInteger('roommate_id');  // Foreign key to the roommate (user receiving application)
            $table->string('status')->default('pending'); // Status of the application (e.g., pending, accepted, rejected)
            $table->timestamps(); // Created at and Updated at
            $table->softDeletes(); // Soft delete column (deleted_at)

            // Adding foreign key constraints
            $table->foreign('applicant_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('roommate_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // Adding indexes for applicant_id and roommate_id for better performance
            $table->index('applicant_id');
            $table->index('roommate_id');

            // Adding a unique constraint to prevent duplicate applications
            $table->unique(['applicant_id', 'roommate_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('roommate_applications');
    }
}
