@extends('layouts.master')
@section('tittle','produk')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data Produk</h3>
                            <a class = "btn btn-danger" href="/produk">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/produk/simpan" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Produk</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="namaproduk"
                                    id=""
                                    value="{{ old('namaproduk') }}"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('namaproduk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="harga"
                                    id=""
                                    value="{{ old('harga') }}"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Satuan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="satuan"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('satuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Stok</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="stok"
                                    id=""
                                    value="{{ old('stok') }}"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('stok')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Gambar</label>
                                <input
                                    type="file"
                                    class="form-control"
                                    name="gambar"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Barcode</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="barcode"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('barcode')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection