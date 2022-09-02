<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $with = ['category', 'author'];
  
  protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

  public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
  {
    $query->when($filters['search'] ?? false, fn($query, $search) =>
      $query->where(fn($query) =>
        $query->where('title', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%')
      )
    );
    // seems like you have to use fn() => syntax for this to work ???
    // $query->when($filters['category'] ?? false, function($query, $category) {
    //   $query
    //     ->whereExists(function($query) {
    //       $query->from('categories')
    //         ->where('categories.id', 'posts.category_id')
    //         ->where('categories.slug', $category);
    //     });
    // });
    $query->when($filters['category'] ?? false, fn($query, $category) =>
      $query->whereHas('category', fn ($query) => 
        $query->where('slug', $category)));
    
    $query->when($filters['author'] ?? false, fn($query, $author) =>
      $query->whereHas('author', fn ($query) => 
        $query->where('username', $author)));
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author() {
    return $this->belongsTo(User::class, 'user_id');
  }
}