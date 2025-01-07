<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResource;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ProductResource;
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

        return ProductDetailResource::collection(
            ProductDetail::query()
            ->when( $sortBy, function($query) use ($sortBy, $sortType) { // Add more sorting conditions if needed
                return $query->whereHas('product', function($q) use ($sortBy, $sortType) {
                    $q->orderBy($sortBy, $sortType);
                });
            })
            ->when( $selectedCategory, function($query) use($selectedCategory) {
                return $query->whereHas('product.category', function ($q) use ($selectedCategory) {
                    $q->where('id', $selectedCategory);
                });
            })
            ->with(['product', 'product.category']) // Eager load relationships
            ->orderBy('id', 'desc') // Default ordering
            ->get()
        );
    }

    public function getBrands(){
        return  Product::select('brand_id')->get()->pluck('brand_id')->filter()->unique()->values();
        
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
        $request->validate([
            'name' => 'required|string|max:155',
            'category_id' => 'required|exists:categories,id',
            'type' => 'nullable|string|max:155',
            'description' => 'nullable|string',
            'status' => 'required|in:1,0',
            'brand_id' => 'required',
            'food_type' => 'nullable|in:veg,non-veg',
        ]);

        try{
            $data =[ "name" =>  $request->name ,
            "sku" => $this->generateUniqueSKU('Product')  ,
            "category_id" =>  $request->category_id ,
            "type" =>  $request->type ,
            "description" =>  $request->description ,
            "status" =>  $request->status === 'active' ?1:0 ,
            "brand_id" =>  $request->brand_id ,
            "food_type" =>  $request->food_type
         ];

            Product::create($data);

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
    public function update(Request $request , ProductDetail $productDetail )
    {
        $request->validate([
           // 'name' => ['required', 'string', 'max:155', Rule::unique('products')->ignore($product->id)],
            'category_id' => 'required|exists:categories,id',
            'type' => 'nullable|string|max:155',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'brand_id' => 'required',
            'food_type' => 'nullable|in:veg,non-veg',
             'images' => 'nullable|array',
        ]);
        
        $productDetail->product()->update([
            "name" =>  $request->name ,
            "category_id" =>  $request->category_id ,
            "type" =>  $request->type ,
            "description" =>  $request->description ,
            "status" =>  $request->status === 'active' ?1:0 ,
            "brand_id" =>  $request->brand_id ,
            "food_type" =>  $request->food_type ,
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


    public function getProductUnit( ProductDetail $productDetail , Request $request ){
        return $productDetail->select('id','unit','unit_size')->where('product_id' , $request->product_id)->get()->transform ( function($item){
            return [
                'value' => $item->id,
                'label' => $item->unit . ' ' . $item->unit_size
            ];
        });
    }


}
