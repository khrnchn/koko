<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'uniform_id',
        'club_id',
        'sport_id',
    ];
    
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function uniform()
    {
        return $this->belongsTo(Uniform::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
