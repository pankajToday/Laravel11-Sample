<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VendorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\VendorResource;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return  VendorResource::collection( User::where('role_id' ,4)->with('vendorDetail')->paginate(10) );
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
    public function store(Request $request)
    {
        $authId = Auth::id() ;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required|min:8',
            'country_code' => 'required|min:2|max:4',
            'mobile' => 'required|min:10|max:10',
            'status' => 'required',
            'shop_name' => 'required',
            'shop_email' => 'required',
            'shop_country_code' => 'required|min:2|max:4',
            'shop_mobile' => 'required',
        ]);


       try {
            DB::beginTransaction();

            $user = User::firstOrCreate([ 'role_id' =>3, 'name' => $request->name,'email' => $request->email],[
                'role_id' =>4, // vendor
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country_code' => $request->country_code,
                'mobile' => $request->mobile,
                'status' => $request->status == 'active'?1:0,
                'profile_img' => $request->user_image,
            
            ]);

            VendorDetail::updateOrcreate([  'name' => $request->shop_name,'user_id' =>  $user->id  ],[
            'user_id' =>   $user->id ,
                'name' => $request->shop_name,
                'email' => $request->shop_email,
                'country_code' => $request->shop_country_code,
                'mobile' => $request->shop_mobile,
                'website' => $request->website,
                'shop_img' => $request->shop_image,
            ]);

            $user->vendorUser()->syncWithoutDetaching(  [$authId]  );
            DB::commit();

            return response()->json(['message' => 'User created successfully.']);
       }
       catch (\Exception $e) {
        return response()->json(['message' => 'Unable to create user!', 'error' => $e->getMessage() ,'error_code'=> $e->getCode()], 500);
       } 
        

       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
