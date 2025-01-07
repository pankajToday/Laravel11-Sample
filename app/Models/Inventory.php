<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Inventory extends Model
{
    use HasFactory , SoftDeletes;

    protected  $table = 'inventories';

    protected  $guarded =[];

    public function productDetail(){
        return $this->belongsTo( productDetail::class ,'product_detail_id','id');
    }
}
