<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandmodel extends Model
{
    use HasFactory;
    
    protected $table = 'brand';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('brand.*','users.nama as created_by') 
        ->join('users','users.id','=','brand.created_by')    
        ->where('brand.is_delete','=',0)
        ->orderBy('brand.id','desc')
        ->get();
    }

    static function getRecordActive()
    {
        return self::select('brand.*') 
        ->join('users','users.id','=','brand.created_by')    
        ->where('brand.is_delete','=',0)
        ->where('brand.status','=',0)
        ->orderBy('brand.nama','asc')
        ->get();
    }
}
