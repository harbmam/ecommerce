@extends('admin.layouts.app')
 
@section('style')
    
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Tambah Warna</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2 ">
                             <a href="{{ url('admin/color/list')}}" class="btn btn-primary">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Warna</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form  action="" method="POST" class="form form-horizontal">
                                            {{ @csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Warna </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="nama" required value="{{ old('nama') }}" placeholder="Nama color">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Kode Warna</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="color" id="first-name" class="form-control" name="code" required value="{{ old('code') }}" placeholder="code Ex. URL">
                                                        <div style="color: red">{{ $errors->first('code') }}</div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="status" class="form-select">
                                                            <option {{ (old('status') ==0) ? 'selected' : ''}} value="0">Active</option>
                                                            <option {{ (old('status') ==1) ? 'selected' : ''}} value="1">Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                        <button type="submit" class="btn btn-primary me-1 mb-0">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-0">Reset</button>
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
<script src="{{ url('public/assets/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('public/assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
<script>
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>


<script src="{{ url('public/assets/js/main.js') }}"></script>
@endsection