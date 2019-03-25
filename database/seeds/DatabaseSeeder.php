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
        $this->call(HomeSeeder::class);
        
        $this->call(AnimalSeeder::class);
        
        $this->call(UserTableSeeder::class);

    }
}
