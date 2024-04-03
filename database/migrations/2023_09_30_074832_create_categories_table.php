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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->integer('section_id');
            $table->string('category_name');
            $table->string('category_discount')->nullable();
            $table->text('description')->nullable();
            $table->integer('position')->nullable();
            $table->string('url');
            $table->string('url_structure')->nullable();
            $table->string('heading_tag')->nullable();
            $table->string('schema_markup')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_data')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_robot')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
