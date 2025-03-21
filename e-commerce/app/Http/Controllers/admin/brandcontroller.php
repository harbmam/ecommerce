<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\brandmodel; 
use Auth;

class brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
       $data['getRecord'] = brandmodel::getRecord();
       $data['header.title'] = 'Brand';
       return view('admin.brand.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header.title'] = 'Tambah Brand';
        return view('admin.brand.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:brand',
        ]);

        $brand = new brandmodel;    
        $brand->nama = trim($request->nama);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->judul = trim($request->judul);
        $brand->deskripsi = trim($request->deskripsi);
        $brand->keyword = trim($request->keyword);
        $brand->created_by = Auth::user()->id;
        $brand->save();
    
    return redirect('admin/brand/list')->with('success', 'Data Brand berhasil ditambahkan.');
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
        $data['getRecord']= brandmodel::getSingle($id);
        $data['header_tittle'] = 'Edit Brand';
        return view('admin.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'slug' => 'required|unique:brand,slug,'.$id
        ]);

        $brand = brandmodel::getsingle($id);
        $brand->nama = trim($request->nama);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->judul = trim($request->judul);
        $brand->deskripsi = trim($request->deskripsi);
        $brand->keyword = trim($request->keyword);
        $brand->created_by = Auth::user()->id;
        $brand->save();
    
    return redirect('admin/brand/list')->with('success', 'Data brand berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = brandmodel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();

        if (!$brand) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect('admin/brand/list')->with('success', 'Data berhasil dihapus.');
    }
}
