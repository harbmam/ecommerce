<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriModel;
use App\Models\produkmodel;   
use App\Models\brandmodel;   
use App\Models\colormodel;   
use App\Models\subkategorimodel;   
use App\Models\produkwarnamodel;   
use App\Models\produksizemodel;   
use App\Models\produkimagemodel;   

use Auth;
use Str;
class produkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['getRecord'] = produkmodel::getRecord();
        $data['header_title'] = 'Produk';
        return view('admin.produk.list', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['getRecord'] = produkmodel::getRecord();
        $data['header_title'] = 'Tambah Produk Baru';
        return view('admin.produk.add', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = trim($request->title);
        $produk = new produkmodel;
        $produk -> title = $title;
        $produk -> created_by = Auth::user()->id;
        $produk -> save();

        $slug = Str::slug($title, "-");

       $checkSlug = produkmodel::checkSlug($slug);
       if(empty($checkSlug))
       {
        $produk->slug= $slug;
        $produk-> save();
       }
       else
       {
        $new_slug = $slug.'-'.$produk->id;
        $produk->slug= $new_slug;
        $produk-> save();
       }
       return redirect ('admin/produk/list/'.$produk->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($produk_id)
    {
        $produk = produkmodel::getSingle($produk_id);
        if(!empty($produk))
        {
            $data['getkategori'] = kategorimodel::getRecordActive();
            $data['getbrand'] = brandmodel::getRecordActive();
            $data['getcolor'] = colormodel::getRecordActive();
            $data['produk'] = $produk;
            $data['getsubkategori'] = subkategorimodel::getRecordSubkategori($produk->kategori_id);
            $data['header_title'] = 'Edit Produk';
            return view('admin.produk.edit', $data);
        }
        return redirect('admin/produk/list')->with('error', 'Produk tidak ditemukan');  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $produk = produkmodel::getSingle($id);
        if(!empty($produk))
        {
            $produk->title = trim($request->title);
            $produk->sku = trim($request->sku);
            $produk->kategori_id = trim($request->kategori_id);
            $produk->sub_kategori = trim($request->sub_kategori);
            $produk->brand_id = trim($request->brand_id);
            $produk->harga = trim($request->harga);
            $produk->old_harga = trim($request->old_harga);
            $produk->short_deskripsi = trim($request->short_deskripsi);
            $produk->deskripsi = trim($request->deskripsi);
            $produk->additional_information = trim($request->additional_information);
            $produk->shipping_returns = trim($request->shipping_returns);
            $produk->status = trim($request->status);
            $produk->save();


            produkwarnamodel::deleterecord($produk->id);

            if(!empty($request->id_warna))
            {
                foreach($request->id_warna as $color_id)
                {
                    $color = new produkwarnamodel;
                    $color->color_id = $color_id;
                    $color->produk_id = $produk->id;
                    $color->save();
                }
            }

            produksizemodel::deleterecord($produk->id);

            if(!empty($request->size))
            {
                foreach($request->size as $size)
                {
                if(!empty($size['nama']))
                {
                    $saveSize = new produksizemodel;
                    $saveSize->nama = $size['nama'];
                    $saveSize->harga = !empty($size['harga']) ? $size['harga'] : 0;
                    $saveSize->produk_id = $produk->id;
                    $saveSize->save();
                }
                
                }
            }

            if(!empty($request->file('gambar')))
            {
             foreach($request->file('gambar') as $file)
             {
                 if($file->isValid())
                 {
                    $ext = $file->getClientOriginalExtension();
                    $randomStr = $produk->id.Str::random(20);
                    $filename = strtolower($randomStr).'.'.$ext;
 
                    $file->storeAs('upload/produk', $filename);
                    $file->move('upload/produk', $filename);

                    $imgaeupload = new produkimagemodel;
                    $imgaeupload->produk_id = $produk->id;
                    $imgaeupload->nama_gambar = $filename;
                    $imgaeupload->extension_gambar = $ext;
                    $imgaeupload->save();
             }
            }
         }

         return redirect()->back()->with('success',"Produk Berhasil Di Update");
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function image_delete(string $id)
    {
        $image = produkimagemodel::getSingle($id);
        if(!empty($image->getGambar()))
        {
            unlink('upload/produk/'.$image->nama_gambar);
        }
        $image->delete();
        return redirect()->back()->with('success', 'Gambar Berhasil Dihapus');
    }
   
    public function produk_image_sortable(Request $request)
    {
        if(!empty($request->gambar_id))
        {
            $i = 1;
            foreach($request->gambar_id as $key)
            {
                $image = produkimagemodel::getSingle($key);
                $image->order_by = $i;
                $image->save();
                $i++;
            }
        }
        $json['success'] = true;
        echo json_encode($json);
    }
     public function destroy(string $id)
    {
        //
    }
}
