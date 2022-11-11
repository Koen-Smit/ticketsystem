<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }

    public function amountTicketsLeft()
    {
        return $this->amount_tickets - $this->tickets()->count();
    }
}
