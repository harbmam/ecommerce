<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkmodel extends Model
{
    use HasFactory;

    protected $table = 'produk';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        return self::select('produk.*', 'users.nama as created_by')
        ->join('users', 'users.id', '=', 'produk.created_by')
        ->where('produk.is_delete', '=', 0)
        ->orderBy('produk.id', 'desc')
        ->get();
    }

    static public function checkSlug($slug)
    {
        return self::where('slug','=',$slug)->count();
    }

    public function getcolor(){
        return $this->hasmany(produkwarnamodel::class, "produk_id");
    }

    public function getsize(){
        return $this->hasmany(produksizemodel::class, "produk_id");
    }

    public function getimage(){
        return $this->hasmany(produkimagemodel::class, "produk_id")->orderBy('order_by', 'asc');
    }
}
