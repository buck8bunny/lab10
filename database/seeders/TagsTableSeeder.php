<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
            Tag::insert([
                [
                    "name"=>"Політика",
                ],
                [
                    "name"=>"Спорт",
                ],
                [
                    "name"=>"Дозвілля",
                ],
                [
                    "name"=>"Кіно",
                ]
            ]);
    }
}
