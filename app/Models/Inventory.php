<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory , SoftDeletes;

    protected  $table = 'inventories';

    protected  $guarded =[];

    public function product(){
        return $this->belongsTo( Product::class );
    }
}
