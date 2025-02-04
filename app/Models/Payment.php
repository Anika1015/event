<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'payment_method',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
