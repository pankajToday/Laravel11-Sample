<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\productDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);

        return [
                 "id" => $this->id ,
                 "product_id" => $this->productDetail->product_id ,
                 "name" => $this->name ,
                 "category_id" => $this->category_id ,
                 "category_name" => $this->category->name   ,
                 "sku" => $this->sku,
                 "type" => $this->type,
                 "brand_id" => $this->brand_id  ,
                 "description" => $this->description ,
                 'image' => $this->baseImage ? $this->baseImage->url:"/assets/img/dummy-product-5.jpg",
                 "food_type" => $this->food_type ? Str::ucfirst($this->food_type) :"N/A",
                 "product_status" =>$this->status ,
                 "base_price" => $this->productDetail? $this->productDetail->base_price :0,
                  "mrp_price" =>  $this->productDetail? $this->productDetail->mrp_price  :0,
                  "sale_price" =>  $this->productDetail? $this->productDetail->sale_price  :0,
                  "unit" =>  $this->productDetail? $this->productDetail->unit  :0,
                  "unit_size" =>  $this->productDetail? $this->productDetail->unit_size :0,
                  "min_stock" =>  $this->productDetail? $this->productDetail->min_stock :0,
                  "max_stock" =>  $this->productDetail? $this->productDetail->max_stock :0,
                  "discount_id" =>  $this->productDetail? $this->productDetail->discount_id :'',
                  "discount_amt" =>  $this->productDetail? $this->productDetail->discount_amt :0,
                  "tax_type" =>  $this->productDetail? $this->productDetail->tax_type :"",
                  "tax_rate" =>  $this->productDetail? $this->productDetail->tax_rate :0,
                  "price" => $this->productDetail?  $this->getPrices( $this->productDetail->product_id):"",
                  'in_stock_quantity' => $this->totalQuantity( $this->productDetail->product_id ),
                  "inventory_status" => $this->totalQuantity(  $this->productDetail->product_id )['quantity'] >  $this->productDetail->min_stock_hold ? "In-Stock":"Out-Stock",

        ];
    }

    function totalQuantity( $productId ){
        return [
            "quantity" => Inventory::where('product_id' , $productId)->where('status','in-stock')->sum('quantity'),
            "quantity_type" => Str::ucfirst( @Inventory::where('product_id' , $productId)->where('status','in-stock')->first()->quantity_type),
        ];
    }

    function getPrices( $productId ){
        return productDetail::select('base_price','mrp_price','sale_price')->where('product_id' , $productId)->first();
    }


}
