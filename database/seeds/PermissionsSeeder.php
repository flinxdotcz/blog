<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
          'name' => 'tag-create',
          'bit' => 1
        ]);
        DB::table('permissions')->insert([
          'name' => 'tag-edit',
          'bit' => 2
        ]);
        DB::table('permissions')->insert([
          'name' => 'tag-delete',
          'bit' => 4
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-create',
          'bit' => 8
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-edit',
          'bit' => 16
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-delete',
          'bit' => 32
        ]);
        DB::table('permissions')->insert([
          'name' => 'user-edit',
          'bit' => 64
        ]);
        DB::table('permissions')->insert([
          'name' => 'user-delete',
          'bit' => 128
        ]);
        DB::table('permissions')->insert([
          'name' => 'image-create',
          'bit' => 256
        ]);
        DB::table('permissions')->insert([
          'name' => 'image-delete',
          'bit' => 512
        ]);
    }
}
