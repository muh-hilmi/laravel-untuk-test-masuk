<?php

use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/blog', function () {
    return BlogResource::collection(Blog::all());
});


// Route::get('/user/{id}', function ($id) {
//     return new UserResource(User::findOrFail($id));
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
