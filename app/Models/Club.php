<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class);  
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'club_id');
    }
}
