<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'BookingID';

    protected $fillable = [
        'UserID', 'EventID', 'event_name', 'event_date', 'location',
        'time_slot', 'number_of_guests','description', 'status',
        'admin_decision', 'rejection_reason', 'amount', 'payment_deadline'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    

    public function event() {
        return $this->belongsTo(Event::class, 'EventID', 'id'); 
    }
    
    
}
