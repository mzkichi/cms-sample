<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 500000; $i++) {
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i .'@sample.com',
                'password' => '$2y$10$YxqTAK3HYNtXo.CUIw1emeq4EV4hzQGgNMw/VQswjpq5hlLZjpgLq'
            ]);
        }
    }
}
