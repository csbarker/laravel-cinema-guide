<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\Cinema::class, 5)->create();
        factory(App\Movie::class, 10)->create();
        factory(App\SessionTime::class, 50)->create();
    }
}
