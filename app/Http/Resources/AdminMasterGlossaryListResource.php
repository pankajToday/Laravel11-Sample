<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminMasterGlossaryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'id' => $this->id ,
                'name' => $this->name ,
                'kirana_vendor_id' => $this->kirana_vendor_id,
                'user_id'   => $this->user_id,
                'status' => $this->status ? true :false , 
                'user_name' => $this->user->name,
                'kirana_vendor_name' => $this->kiranaVendor?$this->kiranaVendor->name :"",
                'is_default' => $this->is_default,
                'item_count'=>$this->glossary_items_count ,
                'created_at' => $this->created_at,
        ];
    }
}
