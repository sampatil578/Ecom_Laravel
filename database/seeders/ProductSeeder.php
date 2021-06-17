<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
            'email' => 'sherlock@gmail.com',
            'product' => 'B. S. Grewal',
            'price' => '300',
            'category' => 'books',
            'gallery' => 'http://ecx.images-amazon.com/images/I/515aVRSntpL._SY344_BO1,204,203,200_QL70_.jpg',
            'description' => 'Book for 1st year enginnering mathematics',
        ],
        [
            'email' => 'johndoe@gmail.com',
            'product' => 'DELL Laptop Charger',
            'price' => '700',
            'category' => 'electronics',
            'gallery' => 'http://s.ecrater.com/stores/324543/5452b173151c6_324543b.jpg',
            'description' => 'Laptop charger of DELL in good condition',
        ],
        [
            'email' => 'sherlock@gmail.com',
            'product' => 'Casio Calculator',
            'price' => '900',
            'category' => 'electronics',
            'gallery' => 'https://n2.sdlcdn.com/imgs/a/8/8/Casio-Scientific-Calculator-fx-991MS-1535018-1-60be8.jpg',
            'description' => 'Casio Calculator',
        ],
        [
            'email' => 'johndoe@gmail.com',
            'product' => 'Engineering Drawing Drafter',
            'price' => '500',
            'category' => 'stationary',
            'gallery' => 'http://www.shrilaxmistores.com/images/omega-mini-drafter.jpg',
            'description' => 'Drafter for Engineering Drawing',
        ]
        ]);
    }
}
