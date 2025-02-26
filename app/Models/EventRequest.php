<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    use HasFactory;

    protected $fillable = ['event_title','event_description', 'event_date','location', 'status', 'user_id'];

    public function payment()
    {
        return $this->hasOne(Payment::class, 'event_id', 'id');
    }

}
