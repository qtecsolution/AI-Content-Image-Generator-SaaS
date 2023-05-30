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
            $table->integer('word_count')->default(0); // 0 mins Word Count limit per request
            $table->integer('max_words')->default(0);
            $table->integer('document_count')->default(0);
            $table->integer('image_count')->default(0);
            $table->boolean('is_published')->default(true);
            $table->double('price',10,2)->default(0); //o mins free
            $table->double('yearly_price',10,2)->nullable(); //o mins free
            $table->string('templates',10)->nullable();
            $table->tinyInteger('support_enabled')->default(0);
            $table->tinyInteger('code_generate_enabled')->default(0);
            $table->tinyInteger('chat_enabled')->default(0);
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
