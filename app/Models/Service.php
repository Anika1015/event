<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services'; // Optional if it's the default convention

    // Add 'Price' to the fillable array if you want to use mass assignment
    protected $fillable = [
        'Name',
        'Description',
        'Price',
    ];
}

