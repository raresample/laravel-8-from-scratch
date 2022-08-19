<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::truncate();
    Category::truncate();
    Post::truncate();

    $user = User::factory()->create();

    $personal = Category::create([
      'name' => 'Personal',
      'slug' => 'personal'
    ]);

    $family = Category::create([
      'name' => 'Family',
      'slug' => 'family'
    ]);

    $work = Category::create([
      'name' => 'Work',
      'slug' => 'work'
    ]);

    Post::create([
      'user_id' => $user->id,
      'category_id' => $family->id,
      'title' => 'My Family Post',
      'slug' => 'my-first-post',
      'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
      'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto aliquid assumenda omnis molestias quia numquam perferendis debitis tempore ab totam maiores dolore, quasi ipsa at porro consequatur rem error id!</p>'
    ]);

    Post::create([
      'user_id' => $user->id,
      'category_id' => $work->id,
      'title' => 'My Work Post',
      'slug' => 'my-second-post',
      'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
      'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto aliquid assumenda omnis molestias quia numquam perferendis debitis tempore ab totam maiores dolore, quasi ipsa at porro consequatur rem error id!</p>'
    ]);

    // \App\Models\User::factory()->create([
    //   'name' => 'Test User',
    //   'email' => 'test@example.com',
    // ]);
  }
}
