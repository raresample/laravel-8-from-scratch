<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post 
{
  public static function all()
  {
    $files = File::files(resource_path("posts/"));

    return array_map(function ($file) {
      return $file->getContents();
    }, $files);
  }

  public static function find($slug)
  {
    // make sure the requested file exists
    if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
      return redirect('/');
      throw new ModelNotFoundException();
    }

    // cache that file
    return cache()->remember("posts.${slug}", now()->addDay(), fn() => file_get_contents($path));
  }
}