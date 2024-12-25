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
                 "id" => $this->id ,
                 "name" => $this->name ,
                 "category_id" => $this->category_id ,
                 "category_name" =>$this->category ? $this->category->name:"N/A"  ,
                 "sku" => $this->sku ,
                 "type" => $this->type ,
                 "brand_id" => $this->brand_id ?? "N/A" ,
                 "price" => $this->getPrices( $this->id ) ,
                 "description" => $this->description ,
                 'image' => $this->baseImage ? $this->baseImage->url:"/assets/img/dummy-product-5.jpg",
               //  'product_detail' => $this->productDetail ? $this->getProductDetails($this->productDetail):[],
                 "product_status" => $this->status ,

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
