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
        //
        DB::table('participant_type')->insert(
            array(
                [
                    'name' => 'Závodník',
                    'min' => 1,
                    'max' => 3,
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Spolujezdec',
                    'min' => 1,
                    'max' => 3,
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Technik',
                    'min' => 2,
                    'max' => 3,
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Manažer',
                    'min' => 1,
                    'max' => 1,
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Fotograf',
                    'min' => 0,
                    'max' => 1,
                    'updated_at' => now(),
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
