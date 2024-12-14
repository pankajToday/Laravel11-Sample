<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait CommonTrait{

    public function generateUniqueSKU($modelName)
    {
        if( $modelName ){

            $modelClass = "App\Models\\" . $modelName ;
            do {
                $sku = 'SKU-' . Str::upper(Str::random(8)); // Example: SKU-ABCD1234
            } while ( $modelClass::where('sku', $sku)->exists());

            return $sku;
        }
        else{
            $sku = 'SKU-' . Str::upper(Str::random(8)); // Example: SKU-ABCD1234
            return $sku;
        }


    }
}