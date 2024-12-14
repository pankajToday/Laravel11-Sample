<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
                [
                    'name' => 'Household Supplies',
                    'slug' => 'household-supplies',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Health & Beauty',
                    'slug' => 'health-beauty',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Goods',
                    'slug' => 'goods',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Frozen Foods',
                    'slug' => 'frozen-foods',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Condiments',
                    'slug' => 'condiments',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Beverages',
                    'slug' => 'beverages',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Snacks',
                    'slug' => 'snacks',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Grains',
                    'slug' => 'grains',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Bakery',
                    'slug' => 'bakery',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Meat',
                    'slug' => 'meat',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Dairy',
                    'slug' => 'dairy',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Vegetables',
                    'slug' => 'vegetables',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Fruits',
                    'slug' => 'fruits',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Grocery',
                    'slug' => 'grocery',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Break-Fast',
                    'slug' => 'break-fast',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Diner',
                    'slug' => 'diner',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Stationary',
                    'slug' => 'stationary',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Hardware',
                    'slug' => 'hardware',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Electronics',
                    'slug' => 'electronics',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Rent',
                    'slug' => 'rent',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Fuel',
                    'slug' => 'fuel',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Travel',
                    'slug' => 'travel',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Transport',
                    'slug' => 'transport',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Miscellaneous',
                    'slug' => 'miscellaneous',
                    'status' => 1,
                    'type' => ''
                ],
                [
                    'name' => 'Other',
                    'slug' => 'other',
                    'status' => 1,
                    'type' => ''
                ]


        ];

        foreach ( $categories as $category ){
            Category::create( $category );
        }
    }
}
