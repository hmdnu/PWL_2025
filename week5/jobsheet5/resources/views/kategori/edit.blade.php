@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>

            <form method="post" action="{{ route('kategori.update', $kategori->kategori_id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label for="kodekategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodekategori" name="kodeKategori"
                            value="{{ $kategori->kategori_kode }}">
                    </div>

                    <div class="form-group">
                        <label for="namakategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namakategori" name="namaKategori"
                            value="{{ $kategori->kategori_nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
