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
                    <h2>Admin list</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3 ">
                             <a href="{{ url('admin/admin/add')}}" class="btn btn-primary">Tambah</a>
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
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ ($val->status == 0) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ url('admin/admin/edit/' . $val->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ url('admin/admin/delete/' . $val->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach
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