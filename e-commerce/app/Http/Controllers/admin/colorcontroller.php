<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\colormodel;
use Auth;

class colorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
       $data['getRecord'] = colormodel::getRecord();
       $data['header.title'] = 'Warna';
       return view('admin.color.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header.title'] = 'Tambah Warna';
        return view('admin.color.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $color = new colormodel;    
        $color->nama = trim($request->nama);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();
    
    return redirect('admin/color/list')->with('success', 'Data Warna berhasil ditambahkan.');
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
        $data['getRecord']= colormodel::getSingle($id);
        $data['header_tittle'] = 'Edit Warna';
        return view('admin.color.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = colormodel::getsingle($id);
        $color->nama = trim($request->nama);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();
    
    return redirect('admin/color/list')->with('success', 'Data Warna berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = colormodel::getSingle($id);
        $color->is_delete = 1;
        $color->save();

        if (!$color) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect('admin/color/list')->with('success', 'Data berhasil dihapus.');
    }
}
