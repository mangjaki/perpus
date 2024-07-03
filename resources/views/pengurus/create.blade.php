@extends('layout.main')

@section('title','Form Tambah Staff')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card col-lg-6">
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-account-plus "> Form Tambah Staff Pengurus <s class=" mdi mdi-account-plus"></s> </h4>
        <p class="card-description d-flex justify-content-center align-items-center">
          > Masukan Data Staff Pengurus <
        </p>
        <form method="POST" action="{{ route('pengurus.store') }}" class="forms-sample" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nip">NIP Staff</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP Staff">
            @error('nip')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama Staff</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Staff">
            @error('nama')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email Staff</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Staff">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Staff</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Staff">
            @error('alamat')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir ">
            @error('tempat_lahir')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
            @error('tanggal_lahir')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
          <div class="form-group">
            <label for="url_foto">Foto Staff</label>
            <input type="url" class="form-control" name="url_foto">
            @error('url_foto')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
          <a href="{{ url('pengurus') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
@endsection