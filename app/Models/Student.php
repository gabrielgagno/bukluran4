<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_num',
        'first_name',
        'middle_name',
        'last_name',
        'contact_num',
    ];
    
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
