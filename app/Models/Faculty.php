<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_number',
        'first_name',
        'middle_name',
        'last_name',
        'position',
        'emp_status',
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
