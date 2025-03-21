<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colormodel extends Model
{
    use HasFactory;

    protected $table = 'color';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('color.*','users.nama as created_by') 
        ->join('users','users.id','=','color.created_by')    
        ->where('color.is_delete','=',0)
        ->orderBy('color.id','desc')
        ->get();
    }

    static function getRecordActive()
    {
        return self::select('color.*') 
        ->join('users','users.id','=','color.created_by')    
        ->where('color.is_delete','=',0)
        ->where('color.status','=',0)
        ->orderBy('color.id','desc')
        ->get();
    }
}
