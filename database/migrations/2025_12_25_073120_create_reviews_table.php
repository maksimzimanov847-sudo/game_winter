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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();


            $table->foreignId('article_id')
                ->constrained('articles')
                ->cascadeOnDelete();


            $table->tinyInteger('rating')->default(0);


            $table->text('comment')->nullable();


            $table->unique(['user_id', 'article_id']);

            $table->timestamps();
            $table->softDeletes(); // мягкое удаление
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};;
