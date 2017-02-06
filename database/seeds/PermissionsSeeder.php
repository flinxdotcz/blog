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
          'title' => 'Create Tag',
          'bit' => 1
        ]);
        DB::table('permissions')->insert([
          'name' => 'tag-edit',
          'title' => 'Edit Tag',
          'bit' => 2
        ]);
        DB::table('permissions')->insert([
          'name' => 'tag-delete',
          'title' => 'Delete Tag',
          'bit' => 4
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-create',
          'title' => 'Create Article',
          'bit' => 8
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-edit',
          'title' => 'Edit Article',
          'bit' => 16
        ]);
        DB::table('permissions')->insert([
          'name' => 'article-delete',
          'title' => 'Delete Article',
          'bit' => 32
        ]);
        DB::table('permissions')->insert([
          'name' => 'user-edit',
          'title' => 'Edit User',
          'bit' => 64
        ]);
        DB::table('permissions')->insert([
          'name' => 'user-delete',
          'title' => 'Delete User',
          'bit' => 128
        ]);
        DB::table('permissions')->insert([
          'name' => 'image-create',
          'title' => 'Create Image',
          'bit' => 256
        ]);
        DB::table('permissions')->insert([
          'name' => 'image-delete',
          'title' => 'Delete Image',
          'bit' => 512
        ]);
        DB::table('permissions')->insert([
          'name' => 'permissions-edit',
          'title' => 'Edit Permissions',
          'bit' => 1024
        ]);
    }
}
