<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('home.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view ('home.produk.tambah', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jepg,jpg,png|max:5048',
            'namaproduk' => 'required|min:5',
            'harga' => 'required|numeric',
            'satuan' => 'required|min:3',
            'stok' => 'required|numeric',
            'barcode' => 'required',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('products', $image->hashName(),'public');

        Produk::create([
            'gambar' => $image->hashName(),
            'namaproduk' => $request->namaproduk,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'barcode' => $request->barcode,
        ]);
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);
        return view('home.produk.edit', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'gambar' => 'image|mimes:jepg,jpg,png|max:5048',
            'namaproduk' => 'required|min:5',
            'harga' => 'required|numeric',
            'satuan' => 'required|min:3',
            'stok' => 'required|numeric',
            'barcode' => 'required'
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {

        $image = $request->file('gambar');
        $image->storeAs('products', $image->hashName(),'public');

        Storage::delete('products/public' . $produk->gambar);

        $produk->update([
            'gambar' => $image->hashName(),
            'namaproduk' => $request->namaproduk,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
        ]);
    } else {
        $produk->update([
            'namaproduk' => $request->namaproduk,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok  
        ]);
    }
    return redirect('/produk')->with(['success' => 'Data Berhasil Diubah!']);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/produk')->with(['success' => 'Yakin Mau Dihapus?']);
    }
}
