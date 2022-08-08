<?php

namespace App\Models;

class Post 
{
  public static function find($slug)
  {
    // make sure the requested file exists
    if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        return redirect('/');
    }

    // cache that file
    return cache()->remember("posts.${slug}", 1200, function () {
      file_get_contents($path);
    });
    
  }
}