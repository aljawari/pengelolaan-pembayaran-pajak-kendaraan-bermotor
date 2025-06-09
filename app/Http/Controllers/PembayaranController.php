<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('kendaraan')->orderBy('id_pembayaran', 'desc')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $kendaraan = Kendaraan::all();
        return view('pembayaran.create', compact('kendaraan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id_kendaraan',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1|max:100000000',
            'metode_bayar' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $kendaraan = Kendaraan::all();
        return view('pembayaran.edit', compact('pembayaran', 'kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id_kendaraan',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1|max:100000000',
            'metode_bayar' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('kendaraan')->findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }
}
