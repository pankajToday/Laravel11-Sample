<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryResource extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->processInventories();
    }

    /**
     * Process and group inventories
     *
     * @return array
     */
    protected function processInventories()
    { 
        // Group inventories by product
        $groupedInventories = $this->collection->groupBy('product_detail_id')->map(function ($inventoryItems) {
            // Get the first inventory item to extract product information
            $firstItem = $inventoryItems->first();
            $product = $firstItem->productDetail &&  $firstItem->productDetail->product ? $firstItem->productDetail->product : null;

            return [
                'product_id' => $product->id,
                'product_detail_id' => $firstItem->product_detail_id,
                'product_name' =>  $product ?  $product->name : null,
                "category_id" => $product &&   $product->category ?  $product->category->id :"",
                "category_name" =>  $product &&   $product->category ?  $product->category->name :"",
                "product_img" =>  $product->baseImage ?   $product->baseImage->url :"/assets/img/dummy-product-5.jpg",
                'product_sku' =>  $product ?  $product->sku : null,
                'product_type' =>  $product ?  $product->type : null,
                "status" =>  $product ?  $product->status :'N/A',
                'inventory' => $inventoryItems->map(function ($inventory) {
                   
                    return [
                        "id"  => $inventory->id ,
                        "sku" => $inventory->sku,
                        "product_id" => $inventory->productDetail && $inventory->productDetail->product ?  $inventory->productDetail->product->id :"",
                        "product_detail_id" => $inventory->product_detail_id,
                        "quantity" => $inventory->quantity,
                        "quantity_type" => $inventory->quantity_type,
                        "status" =>$inventory->status,
                        "base_price" => $inventory->productDetail ? $inventory->productDetail->base_price:0,
                        "mrp_price" => $inventory->productDetail ? $inventory->productDetail->mrp_price:0,
                        "sale_price" =>  $inventory->productDetail ? $inventory->productDetail->sale_price:0,
                        "discount_id" =>  $inventory->productDetail ? $inventory->productDetail->discount_id:0,
                        "discount_amt" => $inventory->productDetail ? $inventory->productDetail->discount_amt:0,
                        "tax_type" =>  $inventory->productDetail ? $inventory->productDetail->tax_type:'',
                        "tax_rate" =>  $inventory->productDetail ? $inventory->productDetail->tax_rate:0,
                        "expiry_date" =>  $inventory->expiry_date ? Carbon::parse( $inventory->expiry_date)->format('Y-m-d'):"",
                        "purchase_date" => $inventory->purchase_date ? Carbon::parse($inventory->purchase_date)->format('Y-m-d'):"",
                        "code_type" =>  $inventory->code_type,
                        "code_number" => $inventory->code_number,
                        // Add any other relevant inventory fields
                    ];
                })->values()->toArray()
            ];
        })->values()->toArray();

        return $groupedInventories;
    }


}
