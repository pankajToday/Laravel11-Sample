<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $sortBy = $request->input('sort_by', 'name');
        $sortType = $request->input('sort_type', 'asc');
        $perPage = $request->input('per_page', 10);

        return CategoryResource::collection(
            Category::query()
                ->when($sortBy, function($query) use ($sortBy, $sortType) {
                    // Handle special cases for status field
                    if ($sortBy === 'status') {
                        return $query->orderBy('status', $sortType);
                    }
                    // Add other special cases if needed
                    return $query->orderBy($sortBy, $sortType);
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
     */
    public function store( Request $request , Category $category )
    {
       try{
           $category = $category->firstOrNew(['name' =>  request('name')]);
           $category->name =  $request->name ;
           // $category->type =  $request->type ;
           $category->status =  $request->status === 'active' ?1:0 ;
           $category->slug =   \Illuminate\Support\Str::slug( request('name') ) ;
           $category->save();

           return response()->json(['data' => [] ] );
       }
       catch ( \Exception $e){
           return response()->json(['message' => $e->getMessage() ] ,503);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category )
    {
        return new  CategoryResource( $category );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      try{
          $category->name =  $request->name ;
          // $category->type =  $request->type ;
          $category->status =  $request->status === 'active' ?1:0 ;
          $category->slug =   \Illuminate\Support\Str::slug( request('name') ) ;
          $category->save();

          return response()->json(['data' => [] ] );
      }
      catch ( \Exception $e){
          return response()->json(['message' => $e->getMessage() ], 503 );
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if( $category )
        {
            $category->delete();
            return response()->json(['message' =>'deleted'  ],200 );
        }
        return response()->json(['data' => [] ],503 );

    }
}
