@extends('layout.main')

@section('title','PEMINJAMAN')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title text-center">PEMINJAMAN</h2>
        <p class="card-description text-center">
          > Table List Peminjaman <
        </p>
        @can('create', App\Peminjaman::class)
          <a href="{{ route('peminjaman.create') }}" class="btn btn-primary col-lg-12">Tambah Peminjaman</a>
        @endcan
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Nama Anggota</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Rak Buku</th>
                <th class="text-center">Nama Pengurus</th>
                <th class="text-center">Tanggal Peminjaman</th>
                <th class="text-center">Tanggal Pengembalian</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($peminjaman as $item)
              <tr>
                <td class="text-center">{{ $item['anggota']['nama'] }}</td>
                <td class="text-center">{{ $item['buku']['judul'] }}</td>
                <td class="text-center">{{ $item['rakbuku']['kode_rak'] }}</td>
                <td class="text-center">{{ $item['pengurus']['nama'] }}</td>
                <td class="text-center">{{ $item['tanggal_pinjam'] }}</td>
                <td class="text-center">{{ $item['tanggal_kembali'] }}</td>
                <td class="text-center">
                  @can('delete', $item)
                    <form action="{{route('peminjaman.destroy', $item["id"])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                    </form>
                  @endcan
                  </br>
                  @can('update', $item)
                    <a href="{{route('peminjaman.edit', $item["id"])}}" class="btn btn-sm btn-rounded btn-warning col-lg-10">Edit</a>
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