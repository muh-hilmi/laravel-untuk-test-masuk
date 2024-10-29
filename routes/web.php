<?php

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/view/blogs', function () {

    return view(
        'blogs',
        [
            'page' => 'all blogs',
            'posts' => Blog::latest()->get()
        ]
    );
});

//posts
Route::apiResource('/blogs', App\Http\Controllers\Api\BlogController::class);
