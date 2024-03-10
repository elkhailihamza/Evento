<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'cover',
        'location',
        'date',
        'automated',
        'category_id',
        'user_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function tickets() {
        return $this->hasMany(Ticket::class, 'event_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
