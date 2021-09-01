<?php

use App\Http\Controllers\Blog\Api\V1\StorePostController;
use Illuminate\Support\Facades\Route;

// API V1
Route::group([], function () {
    // Route::get('/posts', PostsController::class); // Searches the home modules on the dashboard
    Route::post('/posts', StorePostController::class); // Gets all the home modules on the dashboard
});
