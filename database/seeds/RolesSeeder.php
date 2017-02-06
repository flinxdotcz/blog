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
        'permissions_sum' => 1023
      ]);
      DB::table('roles')->insert([
        'name' => 'admin'
      ]);
      DB::table('roles')->insert([
        'name' => 'editor'
      ]);
      DB::table('roles')->insert([
        'name' => 'user'
      ]);
    }
}
