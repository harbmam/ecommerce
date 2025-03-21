@extends('admin.layouts.app')
 
@section('style')
    
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Edit Admin</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2 ">
                             <a href="{{ url('admin/admin/list')}}" class="btn btn-primary">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Admin</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form  action="" method="POST" class="form form-horizontal">
                                            {{ @csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" value="{{ old('nama', $getRecord->nama) }}" name="nama" required placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="email" id="email-id" class="form-control" value="{{ old('email',$getRecord->email) }}" name="email" required placeholder="Email">
                                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>No. HP</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="number" id="contact-info" class="form-control" name="nohp" value="{{ $getRecord->nohp }}">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                                        <p style="color: rgb(33, 89, 243)">Biarkan saja Jika tidak ingin diubah</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Role</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="status" class="form-select">
                                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                                            <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                        <button type="submit" class="btn btn-primary me-1 mb-0">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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