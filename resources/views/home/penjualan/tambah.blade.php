@extends('layouts.master')
@section('tittle','penjualan')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data Penjualan</h3>
                            <a class = "btn btn-danger" href="/penjualan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/penjualan/scan" method="post">
                            @csrf
                            <div class="mb-3">
                                <input 
                                type="hidden"
                                name="nostruk"
                                value="{{ $penjualan->id }}"
                                id=""
                                />
                            </div>
                            <div class="mb-3">
                             <input
                                type="text"
                                onblur="this.focus()"
                                class="form-control"
                                name="id_produk"
                                placeholder="Kode Produk"
                                autofocus
                                id="id_produk"
                                />
                                   @if (session('error'))
                                     <p style="color : red"><i>Produk Tidak Ditemukan</i></p>
                                   @endif               
                            </div>
                            <div class="col-1">
                                <div class="mb-3">

                                <input 
                                type="number"
                                class="form-control"
                                name="qty"
                                min="1"
                                id="qty"
                                value="1"
                                required
                                aria-describedby="helpId"
                                placeholder=""
                                />
                                
                            </div>
                            <div class="col-md-1">
                                <button type="submit"class="btn btn-primary">Check</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Struk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($detailpenjualan as $detailpenjualan)
                            @php 
                            
                            $subtotal =
                            $detailpenjualan->produk->harga *
                            ($produkcounts[$detailpenjualan->id_produk] ?? 0);
                            
                            $total += $subtotal;
                            @endphp
                            
                            <tr class="">
                                <td>{{ $detailpenjualan->nostruk }}</td>
                                <td>{{ $detailpenjualan->produk->namaproduk }}</td>
                                <td>{{ $detailpenjualan->produk->harga}}</td>
                                <td>{{ $produkcounts[$detailpenjualan->id_produk] ?? 0 }}</td>
                                <td>
                                    {{ $detailpenjualan->produk->harga * ($produkcounts[$detailpenjualan->id_produk] ?? 0) }}
                                </td>
                                <td>
                                    <a href="/detailpenjualan/delete/{{ $detailpenjualan->id_produk }}/{{ $detailpenjualan->nostruk }}"
                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
<form action="/penjualan/update/{{ $penjualan->id }}" method="post">
    <input type="hidden" value="{{$total}}" name="ttl">
                            @csrf
                                
                            Total
                            <h1 style="color: black">   
                                Rp. {{ number_format($total) }}
                                <button type="submit" class="btn btn-primary">Check-out</button>
                            </h1>
                        </form>
</footer>
@endsection