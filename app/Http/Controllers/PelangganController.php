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
        $pelanggan = Pelanggan::paginate(5);
        return view('pelanggan.index', compact('pelanggan'));
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
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required',
        ]);

        Pelanggan::create($validatedData);

        return redirect()->route('pelanggan.index')->with('success', 'pelanggan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required',
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->update($validatedData);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }

    // public function pelanggansAvailable() {
    //     $pelanggan = Pelanggan::where('stok','>',0)->paginate(5);

    //     return view('pelanggan.index', compact('pelanggan'));
    // }

    // public function pelanggansUnavailable() {
    //     $pelanggan = Pelanggan::where('stok','=',0)->paginate(5);

    //     return view('pelanggan.index', compact('pelanggan'));
    // }

    // public function updateStok(Request $request, $id) {
    //     $validatedData = $request->validate([
    //         'stok' => 'required|int',
    //     ]);

    //     Pelanggan::where('id', $id)->update($validatedData);

    //     return redirect()->route('pelanggan.index', $id)->with('success','Stok pelanggan berhasil diperbarui.');
    // }
}
