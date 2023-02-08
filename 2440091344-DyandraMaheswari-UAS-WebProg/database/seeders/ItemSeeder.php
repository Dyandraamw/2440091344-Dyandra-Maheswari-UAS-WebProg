<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'item_name' => 'Vegetable 1',
                'item_desc' => 'This vegetable won the 1st place at Canna UK National Giant Vegetables Championship',
                'price' => 100000
            ],
            [
                'item_name' => 'Vegetable 2',
                'item_desc' => 'This vegetable won the 2nd place at Canna UK National Giant Vegetables Championship',
                'price' => 20000
            ],
            [
                'item_name' => 'Vegetable 3',
                'item_desc' => 'This vegetable won the 3rd place at Canna UK National Giant Vegetables Championship',
                'price' => 30000
            ],
            [
                'item_name' => 'Vegetable 4',
                'item_desc' => 'This vegetable won the 4th place at Canna UK National Giant Vegetables Championship',
                'price' => 40000
            ],
            [
                'item_name' => 'Vegetable 5',
                'item_desc' => 'This vegetable won the 5th place at Canna UK National Giant Vegetables Championship',
                'price' => 50000
            ],
            [
                'item_name' => 'Vegetable 6',
                'item_desc' => 'This vegetable won the 6th place at Canna UK National Giant Vegetables Championship',
                'price' => 600000
            ],
            [
                'item_name' => 'Vegetable 7',
                'item_desc' => 'This vegetable won the 7th place at Canna UK National Giant Vegetables Championship',
                'price' => 70000
            ],
            [
                'item_name' => 'Vegetable 8',
                'item_desc' => 'This vegetable won the 8th place at Canna UK National Giant Vegetables Championship',
                'price' => 80000
            ],
            [
                'item_name' => 'Vegetable 9',
                'item_desc' => 'This vegetable won the 9th place at Canna UK National Giant Vegetables Championship',
                'price' => 90000
            ],
            [
                'item_name' => 'Vegetable 10',
                'item_desc' => 'This vegetable won the 10th place at Canna UK National Giant Vegetables Championship',
                'price' => 100000
            ],
            [
                'item_name' => 'Vegetable 11',
                'item_desc' => 'This vegetable won the 11th place at Canna UK National Giant Vegetables Championship',
                'price' => 110000
            ],
            [
                'item_name' => 'Vegetable 12',
                'item_desc' => 'This vegetable won the 12th place at Canna UK National Giant Vegetables Championship',
                'price' => 120000
            ]
        ];

        DB::table('item')->insert($data);
    }
}
