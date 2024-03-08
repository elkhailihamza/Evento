<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_name',
        'ticket_price',
        'ticket_qnt',
        'event_id',
        'tickets_left',
    ];
    public function event() {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function reservations() {
        return $this->hasMany(Reservation::class, 'ticket_id');
    }
}
