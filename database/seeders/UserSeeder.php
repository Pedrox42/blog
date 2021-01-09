<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pedro',
            'email' => 'pedrocl@gmail.com',
            'password' => bcrypt('123456'),
            'function' => '0',
            'enrollment' => '1234567890',
        ]);

        User::factory(20)->create();
    }
}
