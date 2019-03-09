<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
          'name_user' => 'admin',
          'email' => 'admin@bichosdocampus.ufs.br',
          'password' => bcrypt('admin'),
          'nivel_user' => 0,
          'status_user' => 1
        ]);
    }
}
