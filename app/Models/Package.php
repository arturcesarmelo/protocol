<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    const LETTER = 'LETTER';

    const PACKGE = 'PACKAGE';

    const RECEIVED = 'RECEIVED_BY_ADMINISTRATION';

    const DISPATCHED = 'DISPATCHED';

    const DELIVERED = 'DELIVERED';

    const CONFIRMED = 'CONFIRMED';

    protected $fillable = [
        'description',
        'type',
        'status',
        'delivered_at',
        'confirmed_at',
        'tenentment_id',
        'resident_id',
        'identification'
    ];

    protected $casts = [
        'delivered_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    protected $appends = [
        'delivered_at_html'
    ];

    public function tenentment()
    {
        return $this->belongsTo(Tenentment::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Resident::class);
    }

    public function getDeliveredAtHtml()
    {
        $date = $this->delivered_at->format('d/m/Y');
        $hours = $this->delivered_at->format('H:i:s');

        return "<i class='bi bi-calendar'></i> {$date} <i class='bi bi-clock'></i> {$hours}";
    }
}
