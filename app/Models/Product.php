<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoices() {
        return $this->belongsToMany(Sale::class);
    }
}
