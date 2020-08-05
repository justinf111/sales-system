<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoice() {
        return $this->hasMany(Sale::class);
    }
}
