<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\StockInterface;
use App\Traits\IsPurchasable;

class Product extends Model implements StockInterface
{
    use HasFactory, IsPurchasable;

    protected $fillable = ['name', 'seller', 'genre', 'description', 'price', 'stock'];

    //Public function to check stock
    public function hasStock(): bool 
    {
        return $this->stock > 0;
    }

    //Public function to reduce stock
    public function reduceStock(int $quantity): bool
    {
        //If there is stock left when the user goes to purchase the product
        if ($this->stock >= 0)
        {
            //update the stock to take away the amount of items the user is going to buy
            $this->stock-= $quantity;
            //Persist data back to the database
            $this->save();
            //Show we are successful
            return true;
        }
        //Else, return false
        return false;
    }
}
