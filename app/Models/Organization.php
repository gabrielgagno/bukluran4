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
        $this->belongsTo(OrgType::class);
    }
}
