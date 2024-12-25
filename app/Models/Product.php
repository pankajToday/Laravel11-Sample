<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'products';

    protected $guarded =[];

    public function  category(){
        return $this->belongsTo( Category::class,'category_id','id');
    }

    function images(){
        return $this->hasMany( ProductImage::class );
    }

    function baseImage(){
        return $this->hasOne( ProductImage::class )->where('type' ,'primary');
    }


    function productDetail(){
        return $this->hasMany( productDetail::class ,'product_id','id' );
    }
}
