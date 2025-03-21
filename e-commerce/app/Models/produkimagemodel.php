<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkimagemodel extends Model
{
    use HasFactory;

    protected $table = 'produk_gambar';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public function getGambar()
    {
        if(!empty($this->nama_gambar) && file_exists('upload/produk/'. $this->nama_gambar))
        {
            return url('upload/produk/'. $this->nama_gambar);
        }
        else
        {
            return "";
        }
    }
}
