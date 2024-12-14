<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeed extends Seeder
{
    use CommonTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $particulars=[
            [
                'sku' => $this->generateUniqueSKU('Product') , // Generates a SKU like SKU-ABCD1234
                'category_id'=>1,
                'name' => 'Rise',
                'slug' => 'rice',
                'min_stock_hold' => 1,
                'max_stock_hold' => 1000,
                'status' => 1
            ],
            [
                'sku' => $this->generateUniqueSKU('Product') ,
                'category_id'=>1,
                'name' => 'Wheat',
                'slug' => 'wheat',
                'min_stock_hold' => 1,
                'max_stock_hold' => 1000,
                'status' => 1
            ],
            [
                'sku' =>  $this->generateUniqueSKU('Product') ,
                'category_id'=>11,
                'name' => 'Milk Cake',
                'slug' => 'milk-cake',
                'min_stock_hold' => 1,
                'max_stock_hold' => 1000,
                'status' => 1
            ],

        ];

        foreach ( $particulars as $particular ){
           $product =  Product::create( $particular );

            // create product image.
            $this->productImage( $product );

            $this->inventory( $product );
        }
    }


    function productImage( $product ){
        $productImage =  ProductImage::firstOrNew(['product_id' => $product->id]);

        $productImage->type = 'primary'; // Ensure this is a string
        $productImage->url = '/assets/img/dummy-product-5.jpg';  // Ensure this is a string
        $productImage->save();
    }

    function inventory( $product ){
        $inventory =  Inventory::firstOrNew([ 'product_id' => $product->id ]);

        $inventory->sku = $this->generateUniqueSKU('Inventory') ;
        $inventory->product_id = $product->id ;
        $inventory->purchase_date = date('Y-m-d');
        $inventory->quantity = rand(100 ,200);
        $inventory->base_price = rand(100 ,200);
        $inventory->mrp_price =  $inventory->base_price +80;
        $inventory->sale_price = $inventory->base_price +20 ;
        $inventory->status = 'in-stock';
        $inventory->expiry_date = Carbon::now()->addYear(3)->format('Y-m-d');
        $inventory->barcode='8901030708169';

        $inventory->save();
    }
}
