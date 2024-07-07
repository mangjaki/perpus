@extends('layout.main')

@section('title','Buku')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Daftar Buku</h1>
        @can('create', App\Buku::class)
          <a href="{{ route('buku.create') }}" class="btn btn-primary col-lg-2">Tambah Buku</a>
        @endcan
        <hr>
        <div class="row">
            @foreach ($buku as $item)
                <div class="col-md-4 mb-4 ">
                    <div class="card">
                        <div class="card-body ">
                            <img src="{{  $item['url_foto'] }}" class="card-img-top rounded">
                            <h5 class="card-title text-center">{{ $item['judul'] }}</h5>
                            <p class="card-text text-center">{{ $item['genre'] }}</p>
                            <p class="card-text text-center">{{ $item['penerbit'] }}</p>
                            <p class="card-text text-center">{{ $item['tahun_terbit'] }}</p>
                            <p class="card-text text-center"><i>Stok: </i>{{ $item['stok'] }}</p>
                            <div class="text-center p-1">
                              @can('delete', $item)
                                <form action="{{route('buku.destroy', $item["id"])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm">Delete</button>
                                </form>
                              @endcan
                            </div>
                            <div class="text-center">
                              @can('update', $item)
                                <a href="{{route('buku.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-3">Edit</a>
                              @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ url('js/app.js') }}"></script>
</body>
{{-- <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title text-center">Buku</h2>
        <p class="card-description text-center">
          > Table List Buku <
        </p>
        @can('create', App\Buku::class)
          <a href="{{ route('buku.create') }}" class="btn btn-primary col-lg-12">Tambah Buku</a>
        @endcan
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Genre</th>
                <th class="text-center">Penerbit</th>
                <th class="text-center">Tahun Terbit</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buku as $item)
              <tr>
                <td class="text-center"><img src="{{ url('foto/'.$item['url_foto']) }}"></td>
                <td class="text-center">{{ $item['judul'] }}</td>
                <td class="text-center">{{ $item['genre'] }}</td>
                <td class="text-center">{{ $item['penerbit'] }}</td>
                <td class="text-center">{{ $item['tahun_terbit'] }}</td>
                <td class="text-center">
                  @can('delete', $item)
                    <form action="{{route('buku.destroy', $item["id"])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                    </form>
                  @endcan
                  @can('update', $item)
                    <a href="{{route('buku.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-5">Edit</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
  <script>
    Swal.fire({
    title: "Good job!",
    text: "{{session('success')}}",
    icon: "success"
    });
  </script>
@endif
<!-- confirm dialog -->
<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       let form =  $(this).closest("form");
       let name = $(this).data("name");
       event.preventDefault();
       Swal.fire({
         title: " Yakin nak di hapus? ",
         text: "Dak biso balek lagi buyan data kau!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "iyo, Serah aku!"
       })
       .then((willDelete) => {
         if (willDelete.isConfirmed) {
           form.submit();
         }
       });
   });

</script>
@endsection