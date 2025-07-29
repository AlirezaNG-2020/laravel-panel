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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('summary');
            $table->text('body');
            $table->text('image');
            $table->timestamp('published_at');
            $table->tinyInteger('commentable')->default(0)->comment('0: not commentable, 1: commentable');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('post_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('is_active')->default(0)->comment('1: is active, 0: is not active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
