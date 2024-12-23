<?php

namespace App\Http\Resources;

use App\Models\Inventory;
use Carbon\Carbon;
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
                 "name" => $this->name ,
                 "category_id" => $this->category_id ,
                 "category_name" =>$this->category ? $this->category->name:"N/A"  ,
                 "slug" => $this->slug ,
                 "sku" => $this->sku ,
                 "type" => $this->type ,
                 "min_stock_hold" => $this->min_stock_hold,
                 "max_stock_hold" => $this->max_stock_hold,
                 "product_status" => $this->status ,
                 "description" => $this->description ,
                 'image' => $this->baseImage ? $this->baseImage->url:"/assets/img/dummy-product-5.jpg",
                 'quantity' => $this->totalQuantity( $this->id ),
                 "inventory_status" => $this->totalQuantity( $this->id ) > $this->min_stock_hold ? "in-stock":"out-stock" ,//?  $this->inventory->status : 'out-stock' ,
                 'price' => $this->prices( $this->id ),
                 'inventory'=> $this->inventory ? $this->getInventory($this->inventory):"",

        ];
    }


    function totalQuantity( $productId ){
        return Inventory::where('product_id' , $productId)->where('status','in-stock')->sum('quantity');
    }

    function prices( $productId ){
        return Inventory::select('base_price','mrp_price','sale_price')->where('product_id' , $productId)->first();
    }

    function getInventory( $inventories ){
        return collect( $inventories )->transform( function ($data){
            return  [
                // "sku"=> $data->sku ,
                "product_id" => $data->product_id,
                "quantity" => $data->quantity,
                "quantity_type" => $data->quantity_type,
                "status" =>$data->status,
                "base_price" => $data->base_price,
                "mrp_price" => $data->mrp_price,
                "sale_price" => $data->sale_price,
                "min_stock_hold" => $data->min_stock_hold,
                "max_stock_hold" => $data->max_stock_hold,
                "discount_id" => $data->discount_id,
                "discount_amt" => $data->discount_amount,
                "tax_type" => $data->tax_id,
                "tax_rate" => $data->tax_rate,
                "tax_amt" => $data->tax_amt,
                "code_type" => $data->code_type,
                "code_number" => $data->code_number,
                "expiry_date" => $data->expiry ? Carbon::parse($data->expiry)->format('Y-m-d'):"",
                "purchase_date" => $data->purchase_date ? Carbon::parse($data->purchase_date)->format('Y-m-d'):""
            ];
        });
    }
}
