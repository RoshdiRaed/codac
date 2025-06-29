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
        Schema::create('dev_tools', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(); // path or URL
            $table->text('description');
            $table->unsignedInteger('order')->default(0);
            $table->string('link')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_tools');
    }
};
