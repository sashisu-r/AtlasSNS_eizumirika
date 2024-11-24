<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //下記の「DB::」を使用するための宣言
use Illuminate\Support\Facades\Hash; // Hash ファサードを使用するために追加

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => '１号',
             'email' => 'aaa@l.co.jp',
             'password' => Hash::make('abcdef'), // 暗号化処理　アルゴリズム変更する場合はconfig/hashing.phpにて変更する
             'bio' => '自己紹介文'],
             ['username' => '２号',
             'email' => 'bbb@lu.co.jp',
             'password' => Hash::make('000000'),
            'bio' => '自己紹介文'],
             ['username' => '３号',
             'email' => 'ccc@lul.co.jp',
             'password' => Hash::make('123456'),
             'bio' => '自己紹介文入力'],
             ['username' => '４号',
             'email' => 'fff@lull.co.jp',
             'password' => Hash::make('aaaaaaa'),
             'bio' => '自己紹介文です'],
        ]);
    }
}
