<?php

namespace App\Traits;

trait IsPurchasable 
{
    public function isPurchasable(): bool
    {
        // Let's use the "hasStock()" function from our Product model to check if we have stock. If so, return true.
        return $this->hasStock();
    }

    public function getStatusAttribute()
    {
        // If the item is in stock, return "In Stock", if it is not return "Out of stock"
        return $this->isPurchasable() ? 'In stock' : 'Out of stock'; 
    }
}