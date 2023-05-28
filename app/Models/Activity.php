<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'club_id', 'sport_id', 'start_at', 'end_at', 'image_path', 'location_id',  'created_at', 'updated_at'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
    public function uniform()
    {
        return $this->belongsTo(Uniform::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
