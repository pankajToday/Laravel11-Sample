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
        $groupedInventories = $this->collection->groupBy('product_id')->map(function ($inventoryItems) {
            // Get the first inventory item to extract product information
            $firstItem = $inventoryItems->first();

            return [
                'product_id' => $firstItem->product_id,
                'product_name' => $firstItem->product ? $firstItem->product->name : null,
                "category_id" =>$firstItem->product &&  $firstItem->product->category ? $firstItem->product->category->id :"",
                "category_name" => $firstItem->product &&  $firstItem->product->category ? $firstItem->product->category->name :"",
                "product_img" => $firstItem->product->baseImage ?  $firstItem->product->baseImage->url :"/assets/img/dummy-product-5.jpg",
                'product_sku' => $firstItem->product ? $firstItem->product->sku : null,
                'product_type' => $firstItem->product ? $firstItem->product->type : null,
                "min_stock_hold" =>  $firstItem->product ? $firstItem->product->min_stock_hold :0,
                "max_stock_hold" => $firstItem->product ? $firstItem->product->max_stock_hold :0,
                "status" => $firstItem->product ? $firstItem->product->status :'N/A',
                'inventory' => $inventoryItems->map(function ($inventory) {
                    return [
                        "id"  => $inventory->id ,
                        "sku" => $inventory->sku,
                        "product_id" => $inventory->product_id,
                        "quantity" => $inventory->quantity,
                        "quantity_type" => $inventory->quantity_type,
                        "status" =>$inventory->status,
                        "base_price" => $inventory->base_price,
                        "mrp_price" => $inventory->mrp_price,
                        "sale_price" => $inventory->sale_price,
                        "discount_id" => $inventory->discount_id,
                        "discount_amt" => $inventory->discount_amt,
                        "tax_type" => $inventory->tax_type,
                        "tax_rate" => $inventory->tax_rate,
                        "tax_amt" => $inventory->tax_amt,
                        "expiry_date" => $inventory->expiry_date ? Carbon::parse($inventory->expiry_date)->format('Y-m-d'):"",
                        "purchase_date" => $inventory->purchase_date ? Carbon::parse($inventory->purchase_date)->format('Y-m-d'):"",
                        "code_type" => $inventory->code_type,
                        "code_number" => $inventory->code_number ,
                        // Add any other relevant inventory fields
                    ];
                })->values()->toArray()
            ];
        })->values()->toArray();

        return $groupedInventories;
    }


}
