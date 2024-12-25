<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\productDetail;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;


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
                'category_id'=>14,
                'name' => 'Rise',
                 "brand_id" => "Lal Gulab", 
                'status' => 1
            ],
            [
                'sku' => $this->generateUniqueSKU('Product') ,
                'category_id'=>14,
                'name' => 'Wheat',
                "brand_id" => "Ashirwad", 
                'status' => 1
            ],
            [
                'sku' =>  $this->generateUniqueSKU('Product') ,
                'category_id'=>9,
                'name' => 'Milk Cake',
                "brand_id" => "Ashirwad", 
                'status' => 1
            ],
            [
                'sku' =>  $this->generateUniqueSKU('Product') ,
                'category_id'=>9,
                'name' => 'White Bread',
                "brand_id" => "Kisan", 
                'status' => 1
            ],
            [
                'sku' =>  $this->generateUniqueSKU('Product') ,
                'category_id'=>11,
                'name' => 'Ashirwad Cow Milk',
                "brand_id" => "Ashirwad", 
                'status' => 1
            ],
            [
                'sku' =>  $this->generateUniqueSKU('Product') ,
                'category_id'=>11,
                'name' => 'Ashirwad Cow Milk',
                "brand_id" => "Ashirwad", 
                'status' => 1
            ],

        ];

        foreach ( $particulars as $particular ){
           $product =  Product::create( $particular );

            // create product image.
            $this->productImage( $product );

            $fm = $this->productDetails( $product );

            $this->inventory( $fm );
        }
    }


    function productImage( $product ){
        $productImage =  ProductImage::firstOrNew(['product_id' => $product->id]);

        $productImage->type = 'primary'; // Ensure this is a string
        $productImage->url = '/assets/img/dummy-product-5.jpg';  // Ensure this is a string
        $productImage->save();
    }

    
    function productDetails( $product  ){
        $productDetail = new  productDetail();
        
        $productDetail->product_id = $product->id;
        $productDetail->unit =  "ml";
        $productDetail->unit_size = "100" ;
        $productDetail->min_stock_hold =  10 ;
        $productDetail->max_stock_hold =  100;
        $productDetail->base_price = rand(100 ,200) ;
        $productDetail->mrp_price =  $productDetail->base_price +20 ;
        $productDetail->sale_price = $productDetail->base_price + 30;
        $productDetail->discount_id =  "flat";
        $productDetail->discount_amt = 5 ;
        $productDetail->code_type =   'barcode' ;
        $productDetail->code_number = rand(10000,99999);

        $productDetail->save();

        return $productDetail;

    }

    function inventory( $product ){
        $inventory = new Inventory();

        $inventory->sku = $this->generateUniqueSKU('Inventory') ;
        $inventory->product_detail_id = $product->id ;
        $inventory->batch_number = rand(10000 ,99999);
        $inventory->purchase_date = date('Y-m-d');
        $inventory->quantity = rand(100 ,200);
        $inventory->quantity_type = 'pack';
        $inventory->status = 'in-stock';
        $inventory->vendor = 'ABC company';
        $inventory->bill_number = date('mYd-').rand(10000,99999);
        $inventory->bill_date = date('Y-m-d');
        $inventory->status = 'in-stock';

        $inventory->save();
    }

}
