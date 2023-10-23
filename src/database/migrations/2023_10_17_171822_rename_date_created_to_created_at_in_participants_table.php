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
        // Schema::table('participants', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('date_created', 'created_at');
        //     $table->renameColumn('date_updated', 'updated_at');
        // });
        // Schema::table('participant_type', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('date_created', 'created_at');
        //     $table->renameColumn('date_updated', 'updated_at');
        // });
        // Schema::table('team', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('date_created', 'created_at');
        //     $table->renameColumn('date_updated', 'updated_at');
        // });
        // Schema::table('team_meta', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('date_created', 'created_at');
        //     $table->renameColumn('date_updated', 'updated_at');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('participants', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('created_at', 'date_created');
        //     $table->renameColumn('updated_at', 'date_updated');
        // });
        // Schema::table('participant_type', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('created_at', 'date_created');
        //     $table->renameColumn('updated_at', 'date_updated');
        // });
        // Schema::table('team', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('created_at', 'date_created');
        //     $table->renameColumn('updated_at', 'date_updated');
        // });
        // Schema::table('team_meta', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('created_at', 'date_created');
        //     $table->renameColumn('updated_at', 'date_updated');
        // });
    }
};
