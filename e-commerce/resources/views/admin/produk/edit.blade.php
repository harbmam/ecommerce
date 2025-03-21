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
                    <h2>Edit Produk</h2> 
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-2 ">
                             <a href="{{ url('admin/produk/list')}}" class="btn btn-primary">Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Produk</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="" method="POST" enctype="multipart/form-data">
                                            {{ @csrf_field() }}
                                            <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="text" id="first-name-column" class="form-control" required 
                                                            placeholder="Judul" name="title" value="{{ old('title',$produk->title) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">SKU</label>
                                                        <input type="text" id="last-name-column" class="form-control"required 
                                                        placeholder="SKU" name="sku" value="{{ old('sku',$produk->sku) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Kategori</label>
                                                        <select class="form-select" required id="autoSelect" name="kategori_id">
                                                            <option value="">Select</option>
                                                            @foreach ($getkategori as $kat)
                                                                <option {{ ($produk->kategori_id  ==  $kat->id) ? 'selected' : ''}} value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Sub Kategori</label>
                                                        <select class="form-select" required id="getSelect" name="sub_kategori">
                                                            <option value="">Select</option>
                                                            @foreach ($getsubkategori as $sub)
                                                            <option {{ ($produk->sub_kategori  ==  $sub->id) ? 'selected' : ''}} value="{{ $sub->id }}">{{ $sub->nama }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Brand</label>
                                                        <select class="form-select" name="brand_id">
                                                            <option value="">Select</option>
                                                            @foreach ($getbrand as $brand)
                                                            <option {{ ($produk->brand_id  ==  $brand->id) ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->nama }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
<hr>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="mb-2">Warna</label>
                                                    @foreach ($getcolor as $color)
                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($produk->getcolor as $pcolor)
                                                    @if($pcolor->color_id == $color->id)
                                                    @php
                                                    $checked = 'checked';
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                    <div class="mt-1">
                                                   <label><input {{ $checked }} type="checkbox" name="id_warna[]" value="{{ $color->id }}"> {{ $color->nama }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Harga (Rp.)</label>
                                                        <input type="text" id="first-name-column" class="form-control" required 
                                                            placeholder="Rp." name="harga" value="{{ !empty($produk->harga) ? $produk->harga : '' }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Harga Lama (Rp.)</label>
                                                        <input type="text" id="first-name-column" class="form-control" required 
                                                            placeholder="Rp." name="old_harga" value="{{ !empty($produk->old_harga) ? $produk->old_harga : '' }}">
                                                    </div>
                                                </div>

                                                
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Size</label><hr>
                                                <div>
                                                  <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Harga (Rp.)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AppendSize">
                                                        @php
                                                            $i_s = 1;
                                                        @endphp
                                                        @foreach ($produk->getsize as $size)
                                                        <tr id="DeleteSize{{ $i_s }}">
                                                            <td>
                                                                <input type="text" value="{{ $size->nama }}" name="size[{{$i_s}}][nama]" placeholder="Nama Ukuran" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="{{ $size->harga }}" name="size[{{$i_s}}][harga]" placeholder="Harga" class="form-control">
                                                            </td>
                                                            <td>
                                                                <button type="button" id="{{$i_s}}" class="btn btn-danger btn-sm DeleteSize">delete</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i_s++;
                                                        @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="size[100][nama]" placeholder="Nama Ukuran" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="size[100][harga]" placeholder="Harga" class="form-control">
                                                            </td>
                                                            <td>
                                                               <button type="button" class="btn btn-primary btn-sm AddSize">Add</button> 
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                  </table>
                                                 </div>
                                                </div>
                                            </div>
<hr>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="mt-1">Gambar</label>
                                                          <input type="file" name="gambar[]" multiple accept="gambar/*" class="form-control" >
                                                        </div>
                                                    </div>
                                                    </div>

                                                    @if (!empty($produk->getimage->count()))
                                                        <div class="row" id="sortable">
                                                            @foreach ($produk->getimage as $image)
                                                            @if(!empty($image->getGambar()))
                                                            <div class="col-sm-2 mb-2 sortable_image" id="{{ $image->id }}" style="text-align: center;">
                                                                <img style="width: 100px; height: 100px;" src="{{ $image->getGambar() }}"><br>
                                                                <a onclick="return confirm('Anda Yakin ?');" href="{{ url('admin/produk/image_delete/'.$image->id) }}" class="btn btn-danger btn-sm mt-1 "><i class="bi bi-trash"></i></a>
                                                        </div>
                                                        @endif
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Deskripsi Pendek</label>
                                                        <textarea type="text" id="first-name-column" class="form-control" required 
                                                            data-placeholder="Deskripsi Pendek......." name="short_deskripsi">{{ $produk->short_deskripsi }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <textarea type="text" id="" class="form-control editor" required 
                                                            data-placeholder="Deskripsi......" name="deskripsi">{{ $produk->deskripsi }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Infomasi Tambahan</label>
                                                        <textarea type="text" id="" class="form-control editor" required 
                                                            data-placeholder="Infomasi Tambahan......." name="additional_information">{{ $produk->additional_information }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Shipping Return</label>
                                                        <textarea type="text" id="" class="form-control editor" required 
                                                            data-placeholder="Pengiriman barang yang dikembalikan...." name="shipping_returns">{{ $produk->shipping_returns }}
                                                        </textarea>
                                                    </div>
                                                </div>
<hr>
                                   <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-select">
                                            <option {{ ($produk->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ ($produk->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                        </select>
                                    </div>
                                   </div>
                                                <div class="col-12 d-flex justify-content-end mt-2">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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
<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load jQuery UI (agar sortable bisa digunakan) -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Load sortable.js (pastikan file ini benar-benar ada) -->
<script src="{{ url('public/assets/js/sortable.js') }}"></script>

<!-- Load Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

<script>
 $(document).ready(function() {
    $( "#sortable" ).sortable({
    update :function(event, ui){
        var gambar_id= new Array(); 
        $('.sortable_image').each(function(){
            var id = $(this).attr('id');
            gambar_id.push(id);
        });
        $.ajax({
            type : "POST",
            url : "{{ url('admin/produk_image_sortable') }}",
            data : {
                "gambar_id" : gambar_id,
                "_token": "{{ csrf_token() }}"
            },
            dataType : "json",
            success:function(data){
            },
            error: function (data){

            }
        });
    }
});  
  });

      $(document).ready(function() {
        $('.editor').each(function() {
            var placeholderText = $(this).attr('data-placeholder'); // Ambil placeholder dari atribut
            $(this).summernote({
                height: 200,
                placeholder: placeholderText, // Gunakan placeholder dari atribut
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link',]],
                    ['view', ['codeview']]
                ]
            });
        });
    });
    </script>


<script src="{{ url('public/assets/js/main.js') }}"></script>
<script type="text/javascript">
            
            var i = 101;
         $('body').delegate('.AddSize','click', function() {
            // var uniqueId = i++; // Gunakan nilai increment

            var html = ' <tr id="DeleteSize'+i+'">\n\
                            <td>\n\
                            <input type="text" name="size['+i+'][nama]" placeholder="Nama" class="form-control">\n\
                            </td>\n\
                            <td>\n\
                            <input type="text" name="size['+i+'][harga]" placeholder="Harga" class="form-control">\n\
                            </td>\n\
                            <td>\n\
                            <button type="button" id="'+i+'" class="btn btn-danger btn-sm DeleteSize">delete</button> \n\
                            </td>\n\
                         </tr>';
                        
            i++;
            $('#AppendSize').append(html);
          });

          $('body').delegate('.DeleteSize','click',function() {
            var id = $(this).attr('id');
            $('#DeleteSize'+id).remove();
          });

        $('body').delegate('#autoSelect','change', function(e) {
          var id= $(this).val();
          console.log("Kategori dipilih:", id);
            
        $.ajax({
            type : "POST",
            url : "{{ url('admin/get_sub_kategori') }}",
            data : {
                "id" : id,
                "_token": "{{ csrf_token() }}"
            },
            dataType : "json",
            success:function(data){
                $('#getSelect').html(data.html);
            },
            error: function (data){

            }
        });
        });

</script>
@endsection