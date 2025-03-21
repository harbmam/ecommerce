<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksizemodel extends Model
{
    use HasFactory;

    protected $table = 'produk_size';

    static public function deleterecord($produk_id)
    {
        self::where('produk_id', '=', $produk_id)->delete();
    }
}
