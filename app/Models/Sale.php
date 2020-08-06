<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function getTotalAttribute() {
        return $this->product->price;
    }
}
