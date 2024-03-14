<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\Transaksi;


class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $pelanggans = Pelanggan::all()->count();
        $products = Product::all()->count();
        $transaksis = Transaksi::all()->count();
        return view('dashboard',compact('users','products', 'pelanggans','transaksis'));
    }
}
