@extends('admin.layouts.app')
 
@section('style')
    
@endsection

@section('content')
<div id="main">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Edit Sub Kategori</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2 ">
                             <a href="{{ url('admin/sub_kategori/list')}}" class="btn btn-primary">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Sub Kategori</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form  action="" method="POST" class="form form-horizontal">
                                            {{ @csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Sub Kategori </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="nama" required value="{{ old('nama', $getRecord->nama) }}" placeholder="Nama Kategori">
                                                    </div>
                                                   
                                                    <div class="col-md-2">
                                                        <label>Nama Kategori </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="kategori_id" class="form-select">
                                                            <option value="">Pilih</option>
                                                            @foreach ($getkategori as $v)
                                                            <option {{ ($v->id == $getRecord->kategori_id) ? 'selected' : '' }} value="{{ $v->id }}">{{ $v->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nama Slug</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="slug" required value="{{ old('slug', $getRecord->slug) }}" placeholder="Slug Ex. URL">
                                                        <div style="color: red">{{ $errors->first('slug') }}</div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select name="status" class="form-select">
                                                            <option {{ (old('status',$getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                                                            <option {{ (old('status',$getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Judul</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="judul" required value="{{ old('judul', $getRecord->judul) }}" placeholder="Tulis Judul">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Deskripsi</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <textarea id="default" cols="30" rows="10" class="form-control" name="deskripsi" required placeholder="Tambah Deskripsi">{{ old('deskripsi',$getRecord->deskripsi) }} </textarea>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Keyword</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="keyword" required value="{{ old('keyword', $getRecord->keyword) }}" placeholder="Tulis Kata Kunci">
                                                    </div>

                                                    <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                        <button type="submit" class="btn btn-primary me-1 mb-0">update</button>
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