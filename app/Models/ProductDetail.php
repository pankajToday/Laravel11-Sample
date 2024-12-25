<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productDetail extends Model
{
    use HasFactory , SoftDeletes;


    public $table ="product_details";
    public $guarded =[];

    function productDetail(){
        return $this->belongsTo( Product::class );
    }

    function inventory(){
        return $this->hasMany( Inventory::class ,'product_detail_id' ,'id');
    }




}
