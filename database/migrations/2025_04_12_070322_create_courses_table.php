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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('Title');
            $table->string('Category');
            $table->longText('ShortDescription');
            $table->longText('CourseDescription');
            $table->longText('CourseMedia');
            $table->longText('TiCourseThumbnailtle');
            $table->longText('CourseVideo');
            $table->longText('Curriculum');
            $table->string('FAQ');
            $table->string('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
