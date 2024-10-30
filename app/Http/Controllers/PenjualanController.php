<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::orderBy('id','desc')->get();
        return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Penjualan::create([
            'id_user' => Auth::user()->id,
            'status' => 'Belum Selesai',
            'total' => 0,
            'diskon' => 0,
            'bayar' => 0,
           'kembali' => 0,
        ]);

        return redirect()->back();
    }

    public function transaksi($id)
    {

        $penjualan = Penjualan::find($id);
        $detailpenjualan = DetailPenjualan::where('nostruk', $id)
        ->select('id_produk', 'nostruk', 'subtotal', DB::raw('count(*) as total'))
        ->groupBy('id_produk', 'nostruk', 'subtotal')
        ->get();

        $produkcounts = $detailpenjualan->pluck('subtotal','id_produk');

        return view('home.penjualan.tambah', compact('detailpenjualan', 'produkcounts', 'penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        penjualan::create([
            'id_user'=>Auth::user()->id,
            'bayar'=>0,
            'status'=>"Belum Selesai",
            'diskon'=>0,
            'total'=>0,
            'kembali'=>0,

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = Penjualan::find($id);
        return view('home.penjualan.edit', compact('penjualan'));
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
        $penjualan = Penjualan::find($id);

        $penjualan->update([
            'total' => $request->ttl,
            'status' =>'Selesai'
        ]);
        return redirect('/penjualan')->with('success', 'Berhasil');
    }

    public function cetak($id)
    {
        $penjualan = Penjualan::with(['produk'])
        ->where($id);
        $produk = Produk::all();
        $penjualan = Penjualan::find($id);
        return view('home.penjualan.struk', compact('penjualan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
