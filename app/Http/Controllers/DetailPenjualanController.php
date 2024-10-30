<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class DetailpenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barcode = $request->input('id_produk');
        $scan = Produk::where('barcode', $barcode)->first();

        if($scan) {
            
            $qty = $request->input('qty');

            for ($i = 0; $i < $qty; $i++) {

                DetailPenjualan::create([
                    'nostruk' => $request->nostruk,
                    'id_produk' => $scan->id,
                    'jumlahproduk' => $qty,
                    'subtotal' => $qty,
                ]);
            }
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Produk Tidak Ditemukan');
        }
    }
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_produk, $nostruk)
    {
        $detail = DetailPenjualan::where('nostruk', $nostruk)
        ->where('id_produk', $id_produk);

        if ($detail) {
        $detail->delete();
    return redirect()->back()->with('success', 'Produk Berhasil Dihapus');
    } else {
        return redirect('/');
    }
}
}