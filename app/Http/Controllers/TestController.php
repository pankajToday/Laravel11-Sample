<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use CommonTrait;

    function test(){

         return  ProductResource:: collection(  Product::get() );


    }
}
