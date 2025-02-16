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
        Schema::table('quizzes', function (Blueprint $table) {
            $table->integer('score')->default(0)->after('correct_answer');
            $table->unsignedBigInteger('category_id')->after('id'); // Tambah kolom category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropColumn('score');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
