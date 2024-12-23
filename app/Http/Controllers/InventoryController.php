<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Http\Resources\InventoryResource;

class InventoryController extends Controller
{

    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {

        $sortBy = $request->input('sort_by', 'name');
        $sortType = $request->input('sort_type', 'asc');
        $perPage = $request->input('per_page', 10);
        $selectedCategory =  $request->input('selected_category');
        $searchByName = $request->input('search');

        $inventories =  Inventory::query()
            ->whereHas('product', function($query) {
                $query->withoutTrashed(); // Only include inventories with non-deleted products
            })
            //->with('product')
            ->when($sortBy, function($query) use ($sortBy, $sortType) {
                // Handle special cases for status field
                if ($sortBy === 'status') {
                    return $query->orderBy('status', $sortType);
                }
                // Add other special cases if needed
                return $query->orderBy($sortBy, $sortType);
            })
            ->when($selectedCategory, function($query) use($selectedCategory) {
                return $query->whereHas('product.category', function ($q) use($selectedCategory) {
                    $q->where('id', $selectedCategory);
                });
            })
            ->when($searchByName, function($query) use($searchByName) {
                return $query->whereHas('product', function ($q) use($searchByName) {
                    $q->where('name','like', '%'. $searchByName.'%');
                });
            })
            ->orderBy('product_id', 'asc')
            ->get();

        return new InventoryResource($inventories);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Inventory $inventory)
    {
        $inventory->firstOrCreate([ 'id' =>  request('id') ],[
            "sku" =>  $this->generateUniqueSKU("Inventory") ,
            "product_id" =>  $request->product_id ,
            "quantity" =>  $request->quantity ,
            "quantity_type" => $request->quantity_type ,
            "status" =>  $request->status ,
            "base_price" =>  $request->base_price ,
            "mrp_price" =>  $request->mrp_price ,
            "sale_price" =>  $request->sale_price ,
            "discount_id" =>  $request->discount_id ,
            "discount_amt" =>  $request->discount_amt ,

            "tax_type" =>  $request->tax_type ,
            "tax_rate" =>  $request->tax_rate ,
            "tax_amt" =>  $request->tax_amt ,
            "code_type" =>  $request->code_type,
            "code_number" =>  $request->code_number,
            "expiry_date" =>  $request->expiry_date ,
            "purchase_date" =>  $request->purchase_date ,
            "status" =>  $request->status ,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Inventory updated successfully',
        ]);


    }

    public function show(Inventory $inventory){}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory )
    {
        $inventory->updateOrCreate([ 'id' =>  request('id') ],[
            "quantity" =>  $request->quantity ,
            "quantity_type" => $request->quantity_type ,
            "status" =>  $request->status ,
            "base_price" =>  $request->base_price ,
            "mrp_price" =>  $request->mrp_price ,
            "sale_price" =>  $request->sale_price ,
            "discount_id" =>  $request->discount_type ,
            "discount_amt" =>  $request->discount_amt ,

            "tax_type" =>  $request->tax_type ,
            "tax_rate" =>  $request->tax_rate ,
            "tax_amt" =>  $request->tax_amt ,
            "code_type" =>  $request->code_type,
            "code_number" =>  $request->code_number,
            "expiry_date" =>  $request->expiry_date ,
            "purchase_date" =>  $request->purchase_date ,
            "status" =>  $request->status ,

        ]);
    return response()->json(['message' =>'success' ] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        if( $inventory )
        {
            $inventory->delete();
            return response()->json(['message' =>'deleted'  ],200 );
        }
        return response()->json(['data' => [] ],503 );

    }
}
