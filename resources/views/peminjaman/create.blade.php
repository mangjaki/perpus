@extends('layout.main')

@section('title', 'FORM TAMBAH PEMINJAMAN')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-center align-items-center mdi mdi-account-plus "> Form Tambah Peminjaman <s class=" mdi mdi-account-plus"></s> </h4>
            <p class="card-description">
                Form Tambah Peminjaman
            </p>
            <form method="POST" action="{{route('peminjaman.store')}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="anggota_id">Anggota</label>
                    <select name="anggota_id" id="anggota_id" class="form-control">
                        @foreach ($anggota as $items)
                            <option value="{{$items['id']}}">
                                {{$items['nama']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="buku_id">Buku</label>
                    <select name="buku_id" id="buku_id" class="form-control">
                        @foreach ($buku as $items)
                            <option value="{{$items['id']}}">
                                {{$items['judul']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pengurus_id">Pengurus Peminjaman</label>
                    <select name="pengurus_id" id="pengurus_id" class="form-control">
                        @foreach ($pengurus as $items)
                            <option value="{{$items['id']}}">
                                {{$items['nama']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{old('tanggal_pinjam')}}"
                        placeholder="Masukan Tanggal Pinjam">
                    @error('tanggal_pinjam')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{old('tanggal_kembali')}}"
                        placeholder="Masukan Tanggal Kembali">
                    @error('tanggal_kembali')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{url('peminjaman')}}"></a>
            </form>
        </div>
    </div>
</div>
@endsection