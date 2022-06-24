<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $table = 'objective';
    protected $fillable = [
        'name'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    
}
