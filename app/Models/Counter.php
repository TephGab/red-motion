<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = ['completedAc', 'restartedAc', 'duplicatedAc'];

    protected $casts = [
        'completedAc' => 'array',
        'restartedAc' => 'array',
        'duplicatedAc' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
