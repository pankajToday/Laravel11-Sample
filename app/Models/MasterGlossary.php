<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterGlossary extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];
    protected $table = 'master_glossaries';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function kiranaVendor(){
        return $this->belongsTo(User::class,'kirana_vendor_id');
    }
    public function glossaryItems(){
        return $this->hasMany(MasterGlossaryItem::class,'master_glossary_id');
    }
    
}
