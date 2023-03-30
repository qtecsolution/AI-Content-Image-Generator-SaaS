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
        Schema::create('plan_expanses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //who created
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('plan_id');
            
            $table->integer('word_count')->default(0); // 0 mins Word Count limit per request 
            
            $table->integer('call_api_count')->default(0); 
            $table->integer('current_api_count')->default(0); 
            
            $table->integer('documet_count')->default(0);
            $table->integer('current_documet_count')->default(0);
            
            $table->enum('lang',['all','english'])->default('english');
            
            $table->integer('image_count')->default(0);
            $table->integer('current_image_count')->default(0);
            
            $table->dateTime('activated_at')->nullable();
            $table->dateTime('expire_at')->nullable();

        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_expanses');
    }
};
