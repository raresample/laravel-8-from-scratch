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

    $user = User::factory()->create([
      'name' => 'John Doe'
    ]);

    Post::factory(30)->create([
      'user_id' => $user->id
    ]);

    // \App\Models\User::factory()->create([
    //   'name' => 'Test User',
    //   'email' => 'test@example.com',
    // ]);
  }
}
