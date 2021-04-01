<?php

use Illuminate\Database\Seeder;

class TTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        for($i = 0; $i < 100; $i++) {
            DB::table('t_tags')->insert([
                'tag_id'=>$i,
                'goods_id'=>$count
            ]);

            if($i % 2 == 0) {
                $count++;
            }
        }
    }
}
