<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'name' => 'owner',
        'title' => 'Owner',
        'permissions_sum' => 2047
      ]);
      DB::table('roles')->insert([
        'title' => 'Admin',
        'name' => 'admin'
        'permissions_sum' => 127
      ]);
      DB::table('roles')->insert([
        'title' => 'Editor',
        'name' => 'editor'
        'permissions_sum' => 31
      ]);
      DB::table('roles')->insert([
        'title' => 'User',
        'name' => 'user'
        'permissions_sum' => 8
      ]);
    }
}
