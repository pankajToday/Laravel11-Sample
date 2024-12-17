<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
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

       /* return InventoryResource::collection(

        );*/


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
