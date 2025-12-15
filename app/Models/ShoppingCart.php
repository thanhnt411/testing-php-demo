<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public $items = [];

    public function add(string $product)
    {
        $this->items[] = $product;
    }
}
