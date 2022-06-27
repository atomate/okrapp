<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";
    protected $fillable = ['title'];

    public function objectives()
    {
        return $this->hasMany(Objective::class,'company_id','id');
    }
}
