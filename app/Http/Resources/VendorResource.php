<?php

namespace App\Http\Resources;



use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'mobile' => $this->mobile,
            'user_image' => $this->profile_img,
            'address' => $this->address,
            'streat_location' =>$this->streat_location ,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'country_id' => $this->country_id,
            'zip_code' => $this->zip_code,
            'status' => $this->status == 1 ? "Active" : "Inactive",
            'shop_name' => $this->vendorDetail ? $this->vendorDetail->name :"",
            'shop_email' => $this->vendorDetail ?$this->vendorDetail->email :"",
            'shop_country_code' => $this->vendorDetail ? $this->vendorDetail->country_code :"",
            'shop_mobile' => $this->vendorDetail ? $this->vendorDetail->mobile :"",
            'shop_website' => $this->vendorDetail ? $this->vendorDetail->website : "",
            'shop_image' => $this->vendorDetail ? $this->vendorDetail->shop_img :"",
        ];
    }
}
