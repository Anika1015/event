<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'BookingID';

    protected $fillable = [
        'UserID', 'EventID', 'event_name', 'event_date',
        'time_slot', 'number_of_guests','description', 'status', 'venue_id', 'dish_package_id', 'lighting_theme_id', 'amount', 
        'admin_decision', 'rejection_reason', 'amount', 'payment_deadline'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    

    public function event() {
        return $this->belongsTo(Event::class, 'EventID', 'id'); 
    }

    

     // Define the relationship with the Venue model
     public function venue()
     {
         return $this->belongsTo(Venue::class, 'venue_id');
     }
 
     // Define the relationship with the DishPackage model
     public function dishPackage()
     {
         return $this->belongsTo(DishPackage::class, 'dish_package_id');
     }
 
     // Define the relationship with the LightingTheme model
     public function lightingTheme()
     {
         return $this->belongsTo(LightingTheme::class, 'lighting_theme_id');
     }
     public function transactions()
     {
         return $this->hasMany(Transaction::class, 'booking_id', 'BookingID');
     }

    
    
}
