@extends('layout.main')

@section('title','Form Edit Staff')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card col-lg-6">
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-book-open-page-variant "> Form Edit Staff <s class=" mdi mdi-book-open-page-variant"></s> </h4>
        <p class="card-description d-flex justify-content-center align-items-center">
          > Masukan Data Staff <
        </p>
        <form method="POST" action="{{ route('pengurus.update', $pengurus['id']) }}" class="forms-sample" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nip">Nip Staff</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{old('nip') ? old('nip'): $pengurus['nip'] }}" readonly>
                @error('nip')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Staff</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $pengurus['nama'] }}" placeholder="Masukan Nama Staff">
                @error('nama')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Staff</label>
                <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email'): $pengurus['email'] }}" placeholder="Masukan Email Staff">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Staff</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat') ? old('alamat'): $pengurus['alamat'] }}" placeholder="Masukan Alamat Staff">
                @error('alamat')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir Staff</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') ? old('tempat_lahir'): $pengurus['tempat_lahir'] }}" placeholder="Masukan Tempat Lahir Staff">
                @error('alamat')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir Staff</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') ? old('tanggal_lahir'): $pengurus['tanggal_lahir'] }}">
                @error('tanggal_lahir')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url_foto">Foto</label>
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