<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_number',
        'first_name',
        'middle_name',
        'last_name',
        'position',
        'contact_num',
        'emp_status',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
