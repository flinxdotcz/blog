<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $articlesCount = 50;
      $tagsCount = 5;
      $rolesCount = 3;
      $usersCount = 4;
      $faker = \Faker\Factory::create();
      // ROLES TABLE
      DB::table('roles')->insert([
        'name' => 'admin'
      ]);
      foreach (range(2,$rolesCount) as $index) {
        DB::table('roles')->insert([
          'name' => $faker->word
        ]);
      }
      // ME
      DB::table('users')->insert([
        'name' => 'Ondrej Stastny',
        'username' => 'flinkenberg',
        'email' => 'hello@ondrejstastny.com',
        'password' => bcrypt('password'),
        'role_id' => 1,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
      ]);
      // USERS TABLE
      foreach (range(1,$usersCount-1) as $index) {
        DB::table('users')->insert([
          'name' => $faker->name,
          'username' => $faker->userName,
          'email' => $faker->email,
          'password' => bcrypt($faker->word),
          'role_id' => rand(2,$rolesCount),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
        ]);
      }
      // TAGS TABLE
      foreach (range(1,$tagsCount) as $index) {
        DB::table('tags')->insert([
          'name' => $faker->word,
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
        ]);
      }
      // ARTICLES TABLE
      $content = $faker->text($maxNbChars = 900);
      foreach (range(1,$articlesCount) as $index) {
        DB::table('articles')->insert([
          'name' => $faker->text($maxNbChars = 50),
          'content' => $content,
          'thumbnail' => null,
          'user_id' => rand(1,$usersCount),
          'excerpt' => substr($content, 0, 50),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
        ]);
      }
      // ARTICLE TAG PIVOT TABLE
      foreach (range(1,$articlesCount) as $index) {
        DB::table('article_tag')->insert([
          'article_id' => $index,
          'tag_id' => rand(1,$tagsCount)
        ]);
      }
    }
}
