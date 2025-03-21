<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    { 
        $data['getRecord'] = User::getAdmin();
        $data['header_tittle'] = 'Admin';
        return view('admin.admin.list', $data);
    }
    
    public function index()
    {
        // $data['getRecord'] = User::getAdmin();
        // return view('admin.admin.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_tittle'] = 'Tambah Admin';
        return view('admin.admin.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email'
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;    
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Data Admin berhasil ditambahkan.');
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
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
       
        if (!$data['getRecord']) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data['header_tittle'] = 'Edit Admin';
        return view('admin.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'. $id
        ]);

        $user = User::getSingle($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->nohp = $request->nohp;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;    
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Data Admin berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect('admin/admin/list')->with('success', 'Data berhasil dihapus.');
    }
}