@extends('layout.main')

@section('title','Anggota')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title text-center">ANGGOTA</h2>
        <p class="card-description text-center">
          > Table List Anggota <
        </p>
        @can('create', App\Anggota::class)
          <a href="{{ route('anggota.create') }}" class="btn btn-primary col-lg-12">Tambah Anggota</a>
        @endcan
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">Npm</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($anggota as $item)
              <tr>
                <td class="text-center"><img src="{{ $item['url_foto'] }}"></td>
                <td class="text-center">{{ $item['npm'] }}</td>
                <td class="text-center">{{ $item['nama'] }}</td>
                <td class="text-center">{{ $item['email'] }}</td>
                <td class="text-center">{{ $item['alamat'] }}</td>
                <td class="text-center">{{ $item['tempat_lahir'] }}</td>
                <td class="text-center">{{ $item['tanggal_lahir'] }}</td>
                <td class="text-center">
                  @can('delete', $item)
                    <form action="{{route('anggota.destroy', $item["id"])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                    </form>
                  @endcan
                  </br>
                  @can('update', $item)
                    <a href="{{route('anggota.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-12">Edit</a>
                  @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
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