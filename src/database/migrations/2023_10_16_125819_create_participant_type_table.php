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
        Schema::create('participant_type', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('min');
            $table->integer('max');
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_updated')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_type');
    }
};
