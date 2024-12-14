<?php

namespace App\Observers;

use App\Models\Product;
use App\Traits\CommonTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    use CommonTrait;
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $product->inventory()->updateOrCreate(["product_id" => $product->id ],[
            "sku"=> $this->generateUniqueSKU('Inventory') ,
            "product_id" => $product->id,
            "quantity" => request('inventory')['quantity'],
            "status" =>request('inventory')['status'],
            "base_price" => request('inventory')['base_price'],
            "mrp_price" => request('inventory')['mrp_price'],
            "sale_price" => request('inventory')['sale_price'],
            "discount_id" => request('inventory')['discount_id'],
            "discount_amt" => request('inventory')['discount_amount'],
            "tax_type" => request('inventory')['tax_id'],
            "tax_rate" => request('inventory')['tax_rate'],
            "tax_amt" => request('inventory')['tax_amt'],
            "barcode" => request('inventory')['code_type'] =="barcode"? request('inventory')['code_number']:"",
            "qucode" => request('inventory')['code_type'] =="qrcode"? request('inventory')['code_number']:"",
            "expiry_date" => request('inventory')['expiry'] ?Carbon::parse(request('inventory')['expiry'])->format('Y-m-d'):"",
            "purchase_date" => request('inventory')['purchase_date']? Carbon::parse(request('inventory')['purchase_date'])->format('Y-m-d'):""
        ]);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {

    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
