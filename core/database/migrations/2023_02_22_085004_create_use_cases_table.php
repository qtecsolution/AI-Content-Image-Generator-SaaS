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
        Schema::create('use_cases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon');
            $table->string('details')->nullable();
            $table->text('prompt');
            $table->string('title_label')->default('Title')->nullable();
            $table->string('short_description_label')->default('Short Descreption')->nullable();
            $table->string('description_label')->default('Descreption')->nullable();
            $table->unsignedBigInteger('use_case_category_id')->nullable();
            $table->foreign('use_case_category_id')->references('id')->on('use_case_categories')->onDelete('cascade');
            $table->boolean('is_popular')->default(1);
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use_cases');
    }
};
