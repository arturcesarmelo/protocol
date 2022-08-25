<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'tenentment_id'
    ];

    public function tenentment()
    {
        return $this->belongsTo(Tenentment::class);
    }
}
