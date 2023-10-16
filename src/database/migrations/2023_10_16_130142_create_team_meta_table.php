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
        Schema::create('team_meta', function (Blueprint $table) {
            $table->id('id');
            $table->integer('id_team');
            $table->string('key');
            $table->json('id_participants');
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_updated')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_meta');
    }
};
