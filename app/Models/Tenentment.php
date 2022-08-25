<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenentment extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'building_id'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function curriers()
    {
        return $this->belongsToMany(Currier::class);
    }
}
