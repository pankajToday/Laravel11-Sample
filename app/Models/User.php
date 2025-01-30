<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use function Carbon\this;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function userRole(){
        return $this->belongsTo(UserRole::class);
    }

    function userVendor(){
        return $this->belongsToMany( User::class ,'user_vendor' ,'user_id','vendor_id');
    }

    function vendorUser(){
        return $this->belongsToMany( User::class ,'user_vendor' ,'vendor_id','user_id');
    }

    function vendorDetail(){
       // DB::listen( function ($query) { dd(  $query->sql , $query->bindings ) ; } );
        return $this->hasOne( VendorDetail::class ,'user_id','id');
    }


}
