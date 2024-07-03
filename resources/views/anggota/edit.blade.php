@extends('layout.main')

@section('title','Form Edit Anggota')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card col-lg-6">
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-book-open-page-variant "> Form Edit Anggota <s class=" mdi mdi-book-open-page-variant"></s> </h4>
        <p class="card-description d-flex justify-content-center align-items-center">
          > Masukan Data Anggota <
        </p>
        <form method="POST" action="{{ route('anggota.update', $anggota['id']) }}" class="forms-sample" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="npm">Npm Anggota</label>
                <input type="text" class="form-control" id="npm" name="npm" value="{{old('npm') ? old('npm'): $anggota['npm'] }}" readonly>
                @error('npm')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $anggota['nama'] }}" placeholder="Masukan Nama Anggota">
                @error('nama')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Anggota</label>
                <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email'): $anggota['email'] }}" placeholder="Masukan Email Anggota">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Anggota</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat') ? old('alamat'): $anggota['alamat'] }}" placeholder="Masukan Alamat Anggota">
                @error('alamat')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir Anggota</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') ? old('tempat_lahir'): $anggota['tempat_lahir'] }}" placeholder="Masukan Tempat Lahir Anggota">
                @error('alamat')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir Anggota</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') ? old('tanggal_lahir'): $anggota['tanggal_lahir'] }}">
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
            <a href="{{ url('anggota') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
@endsection