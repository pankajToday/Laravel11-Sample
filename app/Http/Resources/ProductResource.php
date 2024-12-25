<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\productDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);

        return [
                 "id" => $this->id ,
                 "name" => $this->name ,
                 "category_id" => $this->category_id ,
                 "category_name" =>$this->category ? $this->category->name:"N/A"  ,
                 "sku" => $this->sku ,
                 "type" => $this->type ,
                 "brand_id" => $this->brand_id ?? "N/A" ,
                 "description" => $this->description ,
                 'image' => $this->baseImage ? $this->baseImage->url:"/assets/img/dummy-product-5.jpg",
                 "product_status" => $this->status ,

        ];
    }


}
