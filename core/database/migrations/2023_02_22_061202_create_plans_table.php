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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //who created
            $table->string('name');
            $table->integer('word_count')->default(0); // 0 mins Work Count limit per request 
            $table->integer('call_api_count')->default(0); 
            $table->integer('documet_count')->default(0);
            $table->enum('lang',['all','english'])->default('english');
            $table->integer('image_count')->default(0);
            $table->boolean('is_published')->default(true);
            $table->double('price',10,2)->default(0); //o mins free
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
