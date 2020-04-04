<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('is_active', ['Yes', 'No'])->default('Yes')->nullable();
            $table->enum('has_remote', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('max_duration_limited', ['Yes', 'No'])->default('Yes')->nullable();
            $table->unsignedInteger('max_allowed_duration')->nullable();
            $table->unsignedInteger('project_duration')->nullable();
            $table->unsignedInteger('funding_source_id')->index()->nullable();
            $table->enum('billed', ['Hourly', 'Daily', 'Weekly', 'Monthly'])->default(null)->nullable();
            $table->enum('is_support_available', ['Yes', 'No'])->default('No')->nullable();
            $table->string('support_email')->default(null)->nullable();
            $table->enum('status', ['Active', 'Suspended', 'Archived'])->default('Active');
            $table->dateTimeTz('start_date')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
