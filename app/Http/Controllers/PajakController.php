<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pajak;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pajak::query();
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nomor_polisi', 'LIKE', "%{$search}%")
                  ->orWhere('nama_pemilik', 'LIKE', "%{$search}%")
                  ->orWhere('merk_kendaraan', 'LIKE', "%{$search}%");
            });
        }
        
        $data = $query->latest()->get();
        return view('pajak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pajak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik'    => 'required|string|max:100',
            'nomor_polisi'    => 'required|string|max:20',
            'jenis_kendaraan' => 'required|in:Motor,Mobil',
            'tahun'           => 'required|numeric|min:0',
            'jumlah_pajak'    => 'required|numeric|min:0',
        ]);

        try {
            Pajak::create($request->all());
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pajak = Pajak::findOrFail($id);
        return view('pajak.show', compact('pajak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pajak = Pajak::findOrFail($id);
        return view('pajak.edit', compact('pajak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pajak = Pajak::findOrFail($id);
        
        $request->validate([
            'nama_pemilik'    => 'required|string|max:100',
            'nomor_polisi'    => 'required|string|max:20',
            'jenis_kendaraan' => 'required|in:Motor,Mobil',
            'tahun'           => 'required|numeric|min:0',
            'jumlah_pajak'    => 'required|numeric|min:0',
        ]);

        try {
            $pajak->update($request->all());
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pajak = Pajak::findOrFail($id);
            $pajak->delete();
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    /**
     * Generate report or export data
     */
    public function report(Request $request)
    {
        $query = Pajak::query();
        
        // Filter by date range if provided
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal_bayar', [$request->start_date, $request->end_date]);
        }
        
        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status_pembayaran', $request->status);
        }
        
        $data = $query->get();
        $totalPajak = $data->sum('total_bayar');
        $totalDenda = $data->sum('denda');
        
        return view('pajak.report', compact('data', 'totalPajak', 'totalDenda'));
    }
}