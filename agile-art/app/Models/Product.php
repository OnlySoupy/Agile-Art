<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\StockInterface;

class Product extends Model implements StockInterface
{
    use HasFactory;

    /**
     * Attributes for any product used site-wide
     * 
     * Keep in mind these should adhere to CALM methodology!
     * This Model should be (c)oncise - it should be abundantly clear what this Model is/isn't and what it can/cannot do.
     * This Model should be (a)gile - it should be able to de deployed quickly and scaled even more quickly.
     * This Model should be (l)oose - it can exist on its own (decoupled) or can be grouped together.
     * This Model should be (m)odular - everything it can do/needs to do should be located in it's own file.
     */

    protected $fillable = ['name', 'seller', 'description', 'price', 'stock'];

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
