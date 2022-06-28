<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'progress',
        'objective_id'
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
