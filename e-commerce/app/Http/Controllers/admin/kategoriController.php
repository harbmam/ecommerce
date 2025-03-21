<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategorimodel;   
use Auth;
class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['getRecord'] = kategorimodel::getRecord();
        $data['header_tittle'] = 'Kategori';
        return view('admin.kategori.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_tittle'] = 'Tambah kategori';
        return view('admin.kategori.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:kategori',
        ]);

        $kategori = new kategorimodel;
        $kategori->nama = trim($request->nama);
        $kategori->slug = trim($request->slug);
        $kategori->status = trim($request->status);
        $kategori->judul = trim($request->judul);
        $kategori->deskripsi = trim($request->deskripsi);
        $kategori->keyword = trim($request->keyword);
        $kategori->created_by = Auth::user()->id;
        $kategori->save();
    
    return redirect('admin/kategori/list')->with('success', 'Data kategori berhasil ditambahkan.');
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
        $data['getRecord']= kategorimodel::getSingle($id);
        $data['header_tittle'] = 'Edit kategori';
        return view('admin.kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:kategori,slug,'.$id
        ]);

        $kategori = kategorimodel::getsingle($id);
        $kategori->nama = trim($request->nama);
        $kategori->slug = trim($request->slug);
        $kategori->status = trim($request->status);
        $kategori->judul = trim($request->judul);
        $kategori->deskripsi = trim($request->deskripsi);
        $kategori->keyword = trim($request->keyword);
        $kategori->created_by = Auth::user()->id;
        $kategori->save();
    
    return redirect('admin/kategori/list')->with('success', 'Data kategori berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategorimodel::getSingle($id);
        $kategori->is_delete = 1;
        $kategori->save();

        if (!$kategori) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect('admin/kategori/list')->with('success', 'Data berhasil dihapus.');
    }
}
