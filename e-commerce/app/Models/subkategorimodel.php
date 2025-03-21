<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkategorimodel extends Model
{
    use HasFactory;

    protected $table = 'sub_kategori';

    static public function getsingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('sub_kategori.*','users.nama as created_by_nama','kategori.nama as kategori_nama') 
        ->join('kategori','kategori.id','=','sub_kategori.kategori_id')    
        ->join('users','users.id','=','sub_kategori.created_by')    
        ->where('sub_kategori.is_delete','=',0)
        ->orderBy('sub_kategori.id','desc')
        ->get();
    }

    static function getRecordSubkategori($kategori_id)
    {
        return self::select('sub_kategori.*') 
        ->join('users','users.id','=','sub_kategori.created_by')    
        ->where('sub_kategori.is_delete','=',0)
        ->where('sub_kategori.status','=',0)
        ->where('sub_kategori.kategori_id','=', $kategori_id)
        ->orderBy('sub_kategori.nama','asc')
        ->get();
    }
}
