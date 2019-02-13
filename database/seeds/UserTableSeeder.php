<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $users = 
        [
          [
            'name' => 'admin',
            'email' => 'admin@bichosdocampus.ufs.br',
            'password' => bcrypt('admin'),
            'nivel' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
          ],
        ];

        DB::table('users')->insert($users);
    }
}
