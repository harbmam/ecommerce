<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriModel;
use App\Models\subkategoriModel;
use Auth;

class subkategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['getRecord'] = subkategorimodel::getRecord();
        $data['header_title'] = 'Sub Kategori';
        return view('admin.subkategori.list', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['getkategori'] = kategorimodel::getRecord();
        $data['header_title'] = 'Tambah Sub Kategori';
        return view('admin.subkategori.add', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:sub_kategori'    
        ]);

        $subkategori = new subkategorimodel;
        $subkategori->kategori_id = trim($request->kategori_id);
        $subkategori->nama = trim($request->nama);
        $subkategori->slug = trim($request->slug);
        $subkategori->status = trim($request->status);
        $subkategori->judul = trim($request->judul);
        $subkategori->deskripsi = trim($request->deskripsi);
        $subkategori->keyword = trim($request->keyword);
        $subkategori->created_by = Auth::user()->id;
        $subkategori->save();
    
    return redirect('admin/sub_kategori/list')->with('success', 'Data Sub Kategori berhasil diedit.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['getkategori'] = kategorimodel::getRecord();
        $data['getRecord']= subkategorimodel::getSingle($id);
        $data['header_tittle'] = 'Edit kategori';
        return view('admin.subkategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:sub_kategori,slug,'.$id    
        ]);

        $subkategori = subkategorimodel::getSingle($id);
        $subkategori->kategori_id = trim($request->kategori_id);
        $subkategori->nama = trim($request->nama);
        $subkategori->slug = trim($request->slug);
        $subkategori->status = trim($request->status);
        $subkategori->judul = trim($request->judul);
        $subkategori->deskripsi = trim($request->deskripsi);
        $subkategori->keyword = trim($request->keyword);
        $subkategori->created_by = Auth::user()->id;
        $subkategori->save();
    
    return redirect('admin/sub_kategori/list')->with('success', 'Data Sub Kategori berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = subkategorimodel::getSingle($id);
        $kategori->is_delete = 1;
        $kategori->save();

        if (!$kategori) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect('admin/sub_kategori/list')->with('success', 'Data berhasil dihapus.');
    }

    public function get_sub_kategori(Request $request)
    {
    $kategori_id = $request->id;
    $get_sub_kategori = subkategorimodel::getRecordSubkategori($kategori_id);
    $html = '';
    $html .= '<option value="">Select</option>';
    foreach ($get_sub_kategori as $val)
    {
        $html .= '<option value="'.$val->id.'">'.$val->nama.'</option>';
    }
    $json['html'] = $html;
    echo json_encode($json);
    }
}
