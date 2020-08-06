<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $dates = [
        'date',
    ];
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function getTotalAttribute() {
        return $this->products()->pluck('price')->sum();
    }
}
