<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{!empty($header_tittle) ? $header_tittle : ''}} - Ecommerce</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.css') }}">
    <!-- Tambahkan di dalam <head> atau sebelum </body> dari chat gpt-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

    <link rel="stylesheet" href="{{ url('public/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ url('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('public/assets/images/favicon.svg') }}" type="{{('image/x-icon')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('style')

</head>

<body> 
    <div id="app">
      @include('admin.layouts.header')

      @yield('content')
           
      @include('admin.layouts.footer')
        </div>
    </div>
<script src="{{ url('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>


<script src="{{ url('public/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ url('public/assets/js/pages/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ url('public/assets/js/main.js') }}"></script>
<script src="{{ url('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/assets/js/main.js') }}"></script>

@yield('script')
</body>
   


</html>