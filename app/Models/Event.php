<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];



    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    public function dishPackages()
    {
        return $this->hasMany(DishPackage::class);
    }

    public function lightingThemes()
    {
        return $this->hasMany(LightingTheme::class);
    }


}
