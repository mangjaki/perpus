@extends('layout.main')

@section('title','Form Tambah Buku')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card col-lg-6">
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-book-open-page-variant "> Form Tambah Buku <s class=" mdi mdi-book-open-page-variant"></s> </h4>
        <p class="card-description d-flex justify-content-center align-items-center">
          > Masukan Data Buku <
        </p>
        <form method="POST" action="{{ route('buku.store') }}" class="forms-sample" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
            @error('judul')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="genre">Genre Buku</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Masukan Genre Buku">
            @error('genre')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="penerbit">Penerbit Buku</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan Penerbit Buku">
            @error('penerbit')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukan Tahun Terbit" required min="1900" max="{{ date('Y')}}">
            @error('tahun_terbit')
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
          <a href="{{ url('buku') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
@endsection