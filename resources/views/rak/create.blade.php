@extends('layout.main')

@section('title','Form Tambah Rak')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card col-lg-6">
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-book-open-page-variant "> Form Tambah Rak <s class=" mdi mdi-book-open-page-variant"></s> </h4>
        <p class="card-description d-flex justify-content-center align-items-center">
          > Masukan Data Rak <
        </p>
        <form method="POST" action="{{ route('rak.store') }}" class="forms-sample" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="kode_rak">Kode Buku</label>
            <input type="text" class="form-control" id="kode_rak" name="kode_rak" placeholder="Masukan Kode Rak">
            @error('kode_rak')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="buku_id">Rak Buku</label>
            <select name="buku_id" id="buku_id" class="form-control">
                @foreach ($buku as $items)
                    <option value="{{$items['id']}}">
                        {{$items['genre']}}
                    </option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="tingkat">Tingkat Rak</label>
            <select type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Masukan Tingat Rak">
              <option value="Baris 1"> Baris 1</option>
              <option value="Baris 2"> Baris 2</option>
              <option value="Baris 3"> Baris 3</option>
            </select>
            @error('kode_rak')
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