<?php

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
    return view('posts');
});

Route::get("posts/{post}", function ($slug) {
    // construct a route
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // make sure the requested file exists
    if (! file_exists($path)) {
        return redirect('/');
    }

    // cache that file
    $post = cache()->remember("posts.${slug}", now()->addDay(), function () use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
    });
    
    // return a view from the file above
    return view('post', [
        'post' => $post
    ]);

// only follow this route if it matches the RegEx
})->where('post', '[A-z_\-]+');