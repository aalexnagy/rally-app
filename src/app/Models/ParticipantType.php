<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantType extends Model
{
    use HasFactory;
    
    protected $table = 'participant_type';
    
    protected $fillable = [
        'name',
        'min',
        'max',
        'created_at',
        'updated_at',
    ];

    // protected $timestamps = true;

    // public function timestamps()
    // {
    //     return [
    //         'created_at' => $this->useCurrent(),
    //         'updated_at' => $this->useCurrent(),
    //     ];
    // }
}