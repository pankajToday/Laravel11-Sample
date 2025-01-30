<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterGlossaryItem extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    protected $table = "master_glossary_items";

    public function glossary(){
        return $this->belongsTo(MasterGlossary::class,'master_glossary_id');
    }   

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }   
}
