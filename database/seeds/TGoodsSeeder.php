<?php

use Illuminate\Database\Seeder;

class TGoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 300000; $i++) {
            DB::table('t_goods')->insert([
                'name'=>'商品名' . $i,
                'photo'=>'data:image/jpeg;base64,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',
                'notice'=>'商品説明' . $i,
                'price'=>'10' . $i,
                'stock'=>$i,
                'user_id'=>1
            ]);
        }
    }
}