<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = ["film_id", "customer_id", "rental_date", "due_date"];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function film() {
        return $this->belongsTo(Film::class);
    }
}
