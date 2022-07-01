<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $table = "companies";
    protected $fillable = ['name', 'user_id'];

    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    public function hasShortName()
    {
        return (strlen($this->name) < 10);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }


}
