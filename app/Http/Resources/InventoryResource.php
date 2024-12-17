<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   /* public function toArray(Request $request): array
    {
       // return parent::toArray($request);
        return   [
            "id"  => $this->id ,
            "sku" => $this->sku,
            "category_id" =>$this->product &&  $this->product->category ? $this->product->category->id :"",
            "category_name" => $this->product &&  $this->product->category ? $this->product->category->name :"",
            "product_id" => $this->product_id,
            "product_name" => $this->product ? $this->product->name :"",
            "product_img" => $this->product &&  $this->product->baseImage ? $this->product->baseImage->url :"/assets/img/dummy-product-5.jpg",
            "quantity" => $this->quantity,
            "status" =>$this->status,
            "base_price" => $this->base_price,
            "mrp_price" => $this->mrp_price,
            "sale_price" => $this->sale_price,
            "min_stock_hold" =>  $this->product ? $this->product->min_stock_hold :0,
            "max_stock_hold" => $this->product ? $this->product->max_stock_hold :0,
            "discount_id" => $this->discount_id,
            "discount_amt" => $this->discount_amount,
            "tax_type" => $this->tax_id,
            "tax_rate" => $this->tax_rate,
            "tax_amt" => $this->tax_amt,
            "barcode" => $this->barcode,
            "qucode" => $this->qucode,
            "expiry_date" => $this->expiry ? Carbon::parse($this->expiry)->format('Y-m-d'):"",
            "purchase_date" => $this->purchase_date ? Carbon::parse($this->purchase_date)->format('Y-m-d'):""
        ];
    }*/



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
                        "status" =>$inventory->status,
                        "base_price" => $inventory->base_price,
                        "mrp_price" => $inventory->mrp_price,
                        "sale_price" => $inventory->sale_price,
                        "discount_id" => $inventory->discount_id,
                        "discount_amt" => $inventory->discount_amount,
                        "tax_type" => $inventory->tax_id,
                        "tax_rate" => $inventory->tax_rate,
                        "tax_amt" => $inventory->tax_amt,
                        "barcode" => $inventory->barcode,
                        "qucode" => $inventory->qucode,
                        "expiry_date" => $inventory->expiry ? Carbon::parse($inventory->expiry)->format('Y-m-d'):"",
                        "purchase_date" => $inventory->purchase_date ? Carbon::parse($inventory->purchase_date)->format('Y-m-d'):""
                        // Add any other relevant inventory fields
                    ];
                })->values()->toArray()
            ];
        })->values()->toArray();

        return $groupedInventories;
    }


}
