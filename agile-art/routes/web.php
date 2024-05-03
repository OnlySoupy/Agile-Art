<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route for dashboard
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified']) // Requirement - user must be authenticated AND verified to access the cart.
    ->name('dashboard');

// Route for Profile
Route::view('profile', 'profile')
    ->middleware(['auth']) // Requirement - user must be authenticated to access the cart.
    ->name('profile');

// Route for cart
Route::view('cart', 'cart')
    ->middleware(['auth']) // Requirement - user must be authenticated to access the cart.
    ->name('cart');

require __DIR__.'/auth.php';
