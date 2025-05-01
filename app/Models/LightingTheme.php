<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightingTheme extends Model {
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
