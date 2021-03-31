<?php

use Illuminate\Database\Seeder;

class TOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        for($i = 0; $i < 1000000; $i++) {
            DB::table('t_orders')->insert([
                'goods_id'=> $count,
                'amount'=> $count,
            ]);
            $count++;
            if($count > 1000) {
                $count = 1;
            }
        }
    }
}
