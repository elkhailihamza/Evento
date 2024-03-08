<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'info',
        'ticket_id',
        'user_id',
        'status',
    ];
    public function user() {
        return $this->belongsTo(user::class, 'user_id');
    }
    public function ticket() {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
