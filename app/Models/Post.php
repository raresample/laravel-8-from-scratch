<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post 
{
  public $title;

  public $date;

  public $excerpt;

  public $body;
  
  public $slug;

  public function __construct($title, $excerpt, $date, $body, $slug)
  {
    $this->title = $title;
    $this->excerpt = $excerpt;
    $this->date= $date;
    $this->body = $body;
    $this->slug = $slug;
  }
  public static function all()
  {
    // probably best to not be caching while making edits to the corresponding view, right?

    // return cache()->rememberForever('posts.all', function() {
    //   return collect(File::files(resource_path("posts")))
    //   ->map(fn($file) => YamlFrontMatter::parseFile($file))
    //   ->map(fn($document) => new Post(
    //     $document->title,
    //     $document->excerpt,
    //     $document->date,
    //     $document->body(),
    //     $document->slug,
    //   ))
    //   ->sortByDesc('date');
    // });

    // so keep this during dev, consider toggling cache later
    return collect(File::files(resource_path("posts")))
    ->map(fn($file) => YamlFrontMatter::parseFile($file))
    ->map(fn($document) => new Post(
      $document->title,
      $document->excerpt,
      $document->date,
      $document->body(),
      $document->slug,
    ))
    ->sortByDesc('date');



  }

  public static function find($slug)
  {
    // find the blog post whose slug matches the request
    return static::all()->firstWhere('slug', $slug);
  }
}