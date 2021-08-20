<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'is_org_login',
        'is_student_login',
        'is_faculty_login',
    ];
}
