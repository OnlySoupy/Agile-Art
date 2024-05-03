<?php

namespace App\Interfaces;

interface StockInterface
{
    public function hasStock(): bool;

    public function reduceStock(int $quantity): bool;

}