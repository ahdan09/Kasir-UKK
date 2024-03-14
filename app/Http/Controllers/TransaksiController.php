<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Product;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        $pelanggans = Pelanggan::all();
        return view('transaksi.index',compact('transaksis','pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentOption = [
            'QRIS' => 'QRIS',
            'DANA' => 'DANA',
            'GoPay' => 'GoPay',
            'ShopeePay' => 'ShopeePay',
            'OVO' => 'OVO',
            'LinkAja' => 'LinkAja',
            'Transfer Bank' => 'Transfer Bank',
            'Kartu Kredit' => 'Kartu Kredit'
        ];
        $products = Product::all();
        $pelanggans = Pelanggan::all();
        return view('transaksi.create',compact('products','pelanggans','paymentOption'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $kasir = Auth::User()->name;
        $validate = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'total_pesanan' => 'required|numeric',
            'pembayaran' => 'required',
        ]);

        $transaksi = new Transaksi();
        $transaksi->kasir = $kasir;
        $transaksi->total_harga = $request->total_pesanan;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->pembayaran = $request->pembayaran;
        $transaksi->nota = mt_rand(1000000000000000, 9999999999999999);

        $transaksi->save();

        $transaksiId = $transaksi->id;

        $products = json_decode($request->product, true);

        foreach ($products as $product) {
            $detail_transaksi = new Detail_Transaksi();
            $detail_transaksi->id_product = $product['productId'];
            $detail_transaksi->quantity = $product['quantity'];
            $detail_transaksi->sub_total = $product['subTotal'];

            $detail_transaksi->id_transaksi = $transaksiId;
            $detail_transaksi->save();

        }

        return redirect()->route('nota')->with('success','Transaksi berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $details = Detail_Transaksi::where('id_transaksi', $id)->get();
        $products = Product::all();
        $pelanggans = Pelanggan::all();

        return view('transaksi.show', compact('transaksi', 'pelanggans', 'details', 'products'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'berhasil menghapus transaksi');

    }

    public function Nota($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $details = Detail_Transaksi::where('id_transaksi', $id)->get();
        $products = Product::all();
        return view('transaksi.nota', compact('transaksi','products','details'));
    }
}
