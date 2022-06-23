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

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function Objective()
    {
        return $this->hasMany(Objective::class); //De pus la Olga in Company Model
    }
}
