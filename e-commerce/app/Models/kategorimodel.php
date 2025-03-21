<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorimodel extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('kategori.*','users.nama as created_by') 
        ->join('users','users.id','=','kategori.created_by')    
        ->where('kategori.is_delete','=',0)
        ->orderBy('kategori.id','desc')
        ->get();
    }

    static function getRecordActive()
    {
        return self::select('kategori.*') 
        ->join('users','users.id','=','kategori.created_by')    
        ->where('kategori.is_delete','=',0)
        ->where('kategori.status','=',0)
        ->orderBy('kategori.nama','asc')
        ->get();
    }
}
