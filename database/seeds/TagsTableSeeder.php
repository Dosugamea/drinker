<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-11-13 21:59:30',
                'updated_at' => '2021-11-13 21:59:30',
                'type' => 0,
                'name' => '紅茶飲料',
                'name_en' => 'tea',
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-11-13 22:05:44',
                'updated_at' => '2021-11-19 22:35:51',
                'type' => 0,
                'name' => 'お茶飲料',
                'name_en' => 'green_tea',
                'user_id' => 1,
            ),
            2 => 
            array (
                'id' => 14,
                'created_at' => '2021-11-19 22:38:27',
                'updated_at' => '2021-11-19 22:38:27',
                'type' => 0,
                'name' => '珈琲飲料',
                'name_en' => 'coffee',
                'user_id' => 1,
            ),
            3 => 
            array (
                'id' => 15,
                'created_at' => '2021-11-19 22:38:54',
                'updated_at' => '2021-11-19 22:38:54',
                'type' => 0,
                'name' => '果実飲料',
                'name_en' => 'fruits',
                'user_id' => 1,
            ),
            4 => 
            array (
                'id' => 16,
                'created_at' => '2021-11-19 22:40:18',
                'updated_at' => '2021-11-19 22:40:18',
                'type' => 0,
                'name' => '炭酸飲料',
                'name_en' => 'soda',
                'user_id' => 1,
            ),
            5 => 
            array (
                'id' => 17,
                'created_at' => '2021-11-19 22:40:49',
                'updated_at' => '2021-11-19 22:40:49',
                'type' => 0,
                'name' => '乳酸飲料',
                'name_en' => 'probiotic',
                'user_id' => 1,
            ),
            6 => 
            array (
                'id' => 18,
                'created_at' => '2021-11-19 22:41:10',
                'updated_at' => '2021-11-19 22:41:10',
                'type' => 0,
                'name' => 'スポーツ飲料',
                'name_en' => 'sports',
                'user_id' => 1,
            ),
            7 => 
            array (
                'id' => 19,
                'created_at' => '2021-11-19 22:42:25',
                'updated_at' => '2021-11-19 22:42:25',
                'type' => 0,
                'name' => '野菜飲料',
                'name_en' => 'vegetables',
                'user_id' => 1,
            ),
            8 => 
            array (
                'id' => 20,
                'created_at' => '2021-11-19 22:42:55',
                'updated_at' => '2021-11-19 22:42:55',
                'type' => 0,
                'name' => 'お酢飲料',
                'name_en' => 'vinegar',
                'user_id' => 1,
            ),
            9 => 
            array (
                'id' => 21,
                'created_at' => '2021-11-19 22:45:29',
                'updated_at' => '2021-11-19 22:45:29',
                'type' => 0,
                'name' => '栄養ドリンク',
                'name_en' => 'pharmaceutical-energy',
                'user_id' => 1,
            ),
            10 => 
            array (
                'id' => 22,
                'created_at' => '2021-11-19 22:45:47',
                'updated_at' => '2021-11-19 22:45:47',
                'type' => 0,
                'name' => 'エナジードリンク',
                'name_en' => 'energy',
                'user_id' => 1,
            )
        ));
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}