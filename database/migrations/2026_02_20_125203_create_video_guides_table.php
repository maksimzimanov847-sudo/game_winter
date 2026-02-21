<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('video_url');       // ссылка на YouTube/Vimeo или путь к файлу
            $table->string('duration')->nullable(); // длительность в формате "мм:сс"
            $table->string('author');           // автор (можно заменить на user_id позже)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_guides');
    }
};
