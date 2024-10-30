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
                            <h3>Halaman Data Produk</h3>
                            @if(session('success'))
                            <div>
                                {{ session('success') }}
                            </div>
                            @endif
                            <a class = "btn btn-primary" href="/produk/tambah">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $produk as $produk )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->namaproduk }}</td>
                                            <td>Rp. {{ number_format($produk->harga) }}</td>
                                            <td>{{ $produk->satuan }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td class="text-center"><img src="{{ asset('/storage/products/'.$produk->gambar) }}" class="rounded" style="width: 150px">
                                        </td>
                                            <td><a class="btn btn-warning" href="/produk/{{$produk->id}}/show">Edit</a>
                                                <a class="btn btn-danger" href="/produk/{{$produk->id}}/delete" onclick="return confirm('Yakin Mau Dihapus Ngab?')">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection