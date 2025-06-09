<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
    {
        $pajaks = Pajak::with('kendaraan')->latest()->get();
        return view('pajak.index', compact('pajaks'));
    }

    public function create()
    {
        $kendaraans = Kendaraan::all();
        return view('pajak.create', compact('kendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik'    => 'required|string|max:100',
            'nomor_polisi'    => 'required|string|max:20',
            'jenis_kendaraan' => 'required|in:Mobil,Motor',
            'tahun'           => 'required|numeric|min:1900|max:' . date('Y'),
            'jumlah_pajak'    => 'required|numeric|min:0',
            'kendaraan_id'    => 'required|exists:kendaraans,id_kendaraan',
        ]);

        Pajak::create($request->all());

        return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pajak = Pajak::with('kendaraan')->findOrFail($id);
        return view('pajak.show', compact('pajak'));
    }

    public function edit($id)
    {
        $pajak = Pajak::findOrFail($id);
        return view('pajak.edit', compact('pajak'));
    }

    public function update(Request $request, $id)
    {
        $pajak = Pajak::findOrFail($id);

        $request->validate([
            'nama_pemilik'    => 'required|string|max:100',
            'nomor_polisi'    => 'required|string|max:20',
            'jenis_kendaraan' => 'required|in:Mobil,Motor',
            'tahun'           => 'required|numeric|min:1900|max:' . date('Y'),
            'jumlah_pajak'    => 'required|numeric|min:0',
            'kendaraan_id'    => 'required|exists:kendaraans,id_kendaraan',
        ]);

        $pajak->update($request->all());

        return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();

        return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil dihapus.');
    }
}
