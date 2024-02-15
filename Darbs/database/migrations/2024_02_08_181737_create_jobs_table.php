<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_description')->nullable();
            $table->string('job_category')->nullable();
            $table->string('job_location')->nullable();
            $table->decimal('job_salary', 10, 2)->nullable();
            $table->date('job_posted_date');
            $table->date('job_expiry_date');
            $table->unsignedBigInteger('user_id');
            

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
        Schema::dropIfExists('jobs');
    }
};
