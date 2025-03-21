<!-- filepath: c:\xampp\htdocs\e-commerce\resources\views\admin\admin\list.blade.php -->
@extends('admin.layouts.app')
 
@section('style')
    
@endsection

@section('content')
<div id="main">
    
    @include('admin.layouts.message')

    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Kategori list</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3 ">
                             <a href="{{ url('admin/kategori/add')}}" class="btn btn-primary">Tambah</a>
                            </div>
                             <!-- table striped -->
                             @php
                                $no = 1;
                             @endphp
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Keyword</th>
                                        <th>Status</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($getRecord) && count($getRecord) > 0)
                                    @foreach ($getRecord as $val)
                                     <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>{{ $val->slug }}</td>
                                        <td>{{ $val->judul }}</td>
                                        <td>{{ strip_tags($val->deskripsi) }}</td>
                                        <td>{{ $val->keyword }}</td>
                                        <td>{{ ($val->status == 0) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-m-y', strtotime($val->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/kategori/edit/' . $val->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ url('admin/kategori/delete/' . $val->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach 
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

<script src="{{ url('public/assets/js/main.js') }}"></script>



@endsection