<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::paginate(10);
        return view('pelanggan.index',compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Pelanggan::create($validateData);
        return redirect()->route('pelanggan.index')->with('success', 'Berhasil membuat pelanggan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validateData = $request->validate([
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        $pelanggan->update($validateData);
        return redirect()->route('pelanggan.index')->with('success', 'Berhasil memperbarui pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Berhasil menghapus pelanggan');
    }
}
