<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 기본적인 menus 데이터를 입력한다
        DB::table('menus')->insert([
            'menu_name'=>'Home',
            'menu_url'=>'/',
            'is_homepage'=>'Y',
        ]);
        DB::table('menus')->insert([
            'menu_name'=>'Introduce',
            'menu_url'=>'introduce',
        ]);
        DB::table('menus')->insert([
            'menu_name'=>'Skill',
            'menu_url'=>'skill',
        ]);
        DB::table('menus')->insert([
            'menu_name'=>'Portfolio',
            'menu_url'=>'portfolio',
            'menu_type'=>'board',
        ]);
        DB::table('menus')->insert([
            'menu_name'=>'Board',
            'menu_url'=>'board',
            'menu_type'=>'board',
        ]);
        DB::table('menus')->insert([
            'menu_name'=>'Contact',
            'menu_url'=>'contact',
        ]);
    }
}
