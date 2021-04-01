<?php

use Illuminate\Database\Seeder;

class MTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++) {
            DB::table('m_tags')->insert([
                'name'=>'タグ' . $i
            ]);
        }
    }
}
