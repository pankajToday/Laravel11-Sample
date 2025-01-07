<?php

namespace App\Http\Resources;


use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\productDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductDetailResource extends JsonResource
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
            // product 
            "id" => $this->id ,
            "product_id" => $this->product_id ,
            "name" => $this->product ? $this->product->name : '',
            "category_id" => $this->product ? $this->product->category_id : "",
            "category_name" => $this->product ? $this->product->category->name : "N/A"  ,
            "sku" => $this->product ? $this->product->sku :"",
            "type" => $this->product ? $this->product->type :"",
            "brand_id" => $this->product ? $this->product->brand_id : "N/A" ,
            "description" => $this->product ? $this->product->description :"",
            'image' => $this->product && $this->product->baseImage ? $this->product->baseImage->url:"/assets/img/dummy-product-5.jpg",
            "product_status" =>$this->product ? $this->product->status :"",
            "food_type" => $this->product ? Str::ucfirst($this->product->food_type) :"'N/A'",

            // product details
            "base_price" => $this->base_price,
             "mrp_price" => $this->mrp_price,
             "sale_price" => $this->sale_price,
             "unit" => $this->unit,
             "unit_size" => $this->unit_size,
             "min_stock" => $this->min_stock_hold,
             "max_stock" => $this->max_stock_hold,
             "discount_id" => $this->discount_id,
             "discount_amt" => $this->discount_amt,
             "tax_type" => $this->tax_type,
             "tax_rate" => $this->tax_rate,
             "total_quantity" => $this->totalQuantity($this->id),
             "price" => $this->getPrices($this->id),
           //  'in_stock_quantity' => $this->totalQuantity( $this->product_id ),
             "inventory_status" => $this->totalQuantity(  $this->product_id )['quantity'] >  $this->min_stock_hold ? "In-Stock":"Out-Stock",
             "inventory" => $this->getInventory( $this->inventory ),

        ];
    }


    function totalQuantity( $productId ){
        return [
            "quantity" => Inventory::where('product_detail_id' , $productId)->where('status','in-stock')->sum('quantity'),
            "quantity_type" => Str::ucfirst( @Inventory::where('product_detail_id' , $productId)->where('status','in-stock')->first()->quantity_type),
        ];
    }

    function getPrices( $productId ){
        return productDetail::select('base_price','mrp_price','sale_price')->where('product_id' , $productId)->first();
    }

    function getInventory( $inventories ){
        return collect( $inventories )->transform( function ($data){
            return  [
                "sku"=> $data->sku ,
                "product_detail_id" => $data->product_detail_id,
                "vendor" =>$data->vendor,
                "bill_date" =>$data->bill_date ? Carbon::parse($data->bill_date)->format('d-m-Y'):"",
                "bill_number" =>$data->batch_number,
                "batch_number" =>$data->batch_number,
                "purchase_date" => $data->purchase_date ? Carbon::parse($data->purchase_date)->format('d-m-Y'):"",
                "quantity" => $data->quantity,
                "quantity_type" => $data->quantity_type,
                "status" =>$data->status,
                "expiry_date" =>$data->expiry_date,
                "code_type" =>$data->code_type,
                "code_number" =>$data->code_number,
            ];
        });
    }

    function getProductDetails( $products ){
        return collect( $products )->transform( function ($data){
            return  [
                "product_id" => $data->product_id,
                "unit" => $data->unit,
                "unit_size" => $data->unit_size,
                "min_stock_hold" => $data->min_stock_hold,
                "max_stock_hold" => $data->max_stock_hold,
                "base_price" => $data->base_price,
                "mrp_price" => $data->mrp_price,
                "sale_price" => $data->sale_price,
                "discount_id" => $data->discount_id,
                "discount_amt" => $data->discount_amount,
                "tax_type" => $data->tax_id,
                "tax_rate" => $data->tax_rate,
                "tax_amt" => $data->tax_amt,
                "code_type" => $data->code_type,
                "code_number" => $data->code_number,
                "expiry_date" => $data->expiry ? Carbon::parse($data->expiry)->format('d-m-Y'):"",
                "status" =>$data->status,
                'inventory'=> $data->inventory ? $this->getInventory( $data->inventory ):"",
                'in_stock_quantity' => $this->totalQuantity( $data->id ),
                "inventory_status" => $this->totalQuantity(  $data->id )['quantity'] >  $data->min_stock_hold ? "In-Stock":"Out-Stock",
            ];
        });
    }
}
