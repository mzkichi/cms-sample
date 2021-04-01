<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 500000; $i++) {
            DB::table('admins')->insert([
                'name' => 'admin' . $i,
                'email' => 'admin' . $i .'@sample.com',
                'password' => '$2y$10$YxqTAK3HYNtXo.CUIw1emeq4EV4hzQGgNMw/VQswjpq5hlLZjpgLq'
            ]);
        }
    }
}
