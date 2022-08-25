<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tenentments()
    {
        return $this->hasMany(Tenentment::class);
    }

    public function countOfResidents(): int
    {
        $residents = 0;
        foreach ($this->tenentments as $tenentment) {
            $residents += $tenentment->residents->count();
        }

        return $residents;
    }

    public function countOfPackages(): int
    {
        $packages = 0;
        foreach ($this->tenentments as $tenentment) {
            $packages += $tenentment->packages->count();
        }

        return $packages;
    }
}
