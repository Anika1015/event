<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishPackage extends Model {
    use HasFactory;
    protected $fillable = ['name', 'price_per_guest', 'image','event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
