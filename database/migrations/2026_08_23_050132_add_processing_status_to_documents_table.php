<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('processing_status')
                ->default('uploaded')
                ->after('file_size');

            $table->unsignedInteger('chunk_count')
                ->default(0)
                ->after('processing_status');

            $table->text('processing_error')
                ->nullable()
                ->after('chunk_count');

            $table->timestamp('processed_at')
                ->nullable()
                ->after('processing_error');
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'processing_status',
                'chunk_count',
                'processing_error',
                'processed_at',
            ]);
        });
    }
};