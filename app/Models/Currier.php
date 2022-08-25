<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function tenentments()
    {
        return $this->belongsToMany(Tenentment::class);
    }
}
