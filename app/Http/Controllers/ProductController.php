<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CommonTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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

        return ProductResource::collection(
            Product::query()
                ->when($sortBy, function($query) use ($sortBy, $sortType) {
                    // Handle special cases for status field
                    if ($sortBy === 'status') {
                        return $query->orderBy('status', $sortType);
                    }
                    // Add other special cases if needed
                    return $query->orderBy($sortBy, $sortType);
                })
                ->when($selectedCategory, function($query) use($selectedCategory) {
                    // Add other special cases if needed
                    return $query->whereHas('category' , function ($q)use( $selectedCategory ){
                        $q->where( 'id' , $selectedCategory );
                    } );
                })
                ->orderBy('name' ,'asc')
                ->get()
        );
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
     * check product Observer for Inventory and Image upload..
     */
    public function store( Request $request , Product $product )
    {
        try{
             $product->updateOrCreate(['name' =>  request('name'),'category_id' => request('category_id')],[
                "name" =>  $request->name ,
                "sku" => $this->generateUniqueSKU('Product')  ,
                "category_id" =>  $request->category_id ,
                "type" =>  $request->type ,
                "max_stock_hold" =>  $request->max_stock_hold ,
                "min_stock_hold" =>  $request->min_stock_hold ,
                "description" =>  $request->description ,
                "status" =>  $request->status === 'active' ?1:0 ,
                "slug" =>   \Illuminate\Support\Str::slug( request('name') ) ,
            ]);


            return response()->json(['message' =>'success' ] );
        }
        catch ( \Exception $e){
            return response()->json(['message' => $e->getMessage() ] ,503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( Product $product  )
    {
        return new  ProductResource( $product->load('category')  );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

            $product->updateOrCreate(['name' =>  request('name'),'category_id' => request('category_id')],[
                "name" =>  $request->name ,
                "sku" => $this->generateUniqueSKU('Product')  ,
                "category_id" =>  $request->category_id ,
                "type" =>  $request->type ,
                "max_stock_hold" =>  $request->max_stock_hold ,
                "min_stock_hold" =>  $request->min_stock_hold ,
                "description" =>  $request->description ,
                "status" =>  $request->status === 'active' ?1:0 ,
                "slug" =>   \Illuminate\Support\Str::slug( request('name') ) ,
            ]);
        return response()->json(['message' =>'success' ] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if( $product )
        {
            $product->delete();
            return response()->json(['message' =>'deleted'  ],200 );
        }
        return response()->json(['data' => [] ],503 );

    }


}
