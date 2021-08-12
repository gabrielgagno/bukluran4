<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'description',
        'address',
        'date_established',
        'is_sec_registered',
        'comments',
    ];

    public function orgType()
    {
        return $this->belongsTo(OrgType::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot(['is_officer', 'officer_position']);
    }
}
