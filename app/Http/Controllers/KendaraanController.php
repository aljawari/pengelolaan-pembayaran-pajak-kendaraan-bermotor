<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::orderBy('id_kendaraan', 'desc')->get();
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_polisi'     => 'required|string|max:20|unique:kendaraans,nomor_polisi',
            'merk'             => 'required|string|max:100',
            'tipe'             => 'required|string|max:100',
            'jenis'            => 'required|string|in:Mobil,Motor',
            'tahun_pembuatan'  => 'required|numeric|min:1900|max:' . date('Y'),
            'warna'            => 'required|string|max:50',
        ]);

        try {
            $kendaraan = Kendaraan::create([
                'nomor_polisi'     => $request->nomor_polisi,
                'merk'             => $request->merk,
                'tipe'             => $request->tipe,
                'jenis'            => $request->jenis,
                'tahun_pembuatan'  => $request->tahun_pembuatan,
                'warna'            => $request->warna,
            ]);

            return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'nomor_polisi'     => 'required|string|max:20|unique:kendaraans,nomor_polisi,' . $kendaraan->id_kendaraan . ',id_kendaraan',
            'merk'             => 'required|string|max:100',
            'tipe'             => 'required|string|max:100',
            'jenis'            => 'required|string|in:Mobil,Motor',
            'tahun_pembuatan'  => 'required|numeric|min:1900|max:' . date('Y'),
            'warna'            => 'required|string|max:50',
        ]);

        $kendaraan->update($request->only([
            'nomor_polisi', 'merk', 'tipe', 'jenis', 'tahun_pembuatan', 'warna',
        ]));

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus.');
    }

    public function show($id)
    {
        $kendaraan = Kendaraan::with('pembayarans')->findOrFail($id);
        return view('kendaraan.show', compact('kendaraan'));
    }
}
