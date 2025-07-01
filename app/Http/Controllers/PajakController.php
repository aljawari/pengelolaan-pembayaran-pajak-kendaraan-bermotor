<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PajakController extends Controller
{
    public function index()
    {
        try {
            $pajaks = Pajak::with('kendaraan')->latest()->get();
            Log::info('Halaman index pajak diakses', ['total_data' => $pajaks->count()]);
            return view('pajak.index', compact('pajaks'));
        } catch (\Exception $e) {
            Log::error('Gagal memuat halaman index pajak', ['error' => $e->getMessage()]);
            return redirect('/')->with('error', 'Gagal menampilkan data pajak.');
        }
    }

    public function create()
    {
        try {
            $kendaraans = Kendaraan::all();
            Log::info('Halaman form tambah pajak diakses');
            return view('pajak.create', compact('kendaraans'));
        } catch (\Exception $e) {
            Log::error('Gagal membuka form create pajak', ['error' => $e->getMessage()]);
            return redirect('/pajak')->with('error', 'Gagal membuka form tambah pajak!');
        }
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

        DB::beginTransaction();

        try {
            $pajak = Pajak::create($request->all());
            DB::commit();

            Log::info('Data pajak berhasil ditambahkan', ['id' => $pajak->id]);
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan data pajak', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
              
            ]);
            return redirect()->back()->with('error', 'Gagal menyimpan data pajak.');
        }
    }

    public function show($id)
    {
        try {
            $pajak = Pajak::with('kendaraan')->findOrFail($id);
            Log::info('Menampilkan detail pajak', ['id' => $id]);
            return view('pajak.show', compact('pajak'));
        } catch (ModelNotFoundException $e) {
            Log::warning('Data pajak tidak ditemukan saat akses detail', ['id' => $id]);
            return redirect('/pajak')->with('error', 'Data pajak tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pajak = Pajak::findOrFail($id);
            Log::info('Akses halaman edit pajak', ['id' => $id]);
            return view('pajak.edit', compact('pajak'));
        } catch (ModelNotFoundException $e) {
            Log::warning('Data pajak tidak ditemukan saat edit', ['id' => $id]);
            return redirect('/pajak')->with('error', 'Data pajak tidak ditemukan untuk diedit.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik'    => 'required|string|max:100',
            'nomor_polisi'    => 'required|string|max:20',
            'jenis_kendaraan' => 'required|in:Mobil,Motor',
            'tahun'           => 'required|numeric|min:1900|max:' . date('Y'),
            'jumlah_pajak'    => 'required|numeric|min:0',
            'kendaraan_id'    => 'required|exists:kendaraans,id_kendaraan',
        ]);

        try {
            $pajak = Pajak::findOrFail($id);
            $pajak->update($request->all());

            Log::info('Data pajak diperbarui', ['id' => $id]);
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::warning('Gagal update - data pajak tidak ditemukan', ['id' => $id]);
            return redirect('/pajak')->with('error', 'Data pajak tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat update pajak', [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $pajak = Pajak::findOrFail($id);
            $pajak->delete();

            Log::info('Data pajak berhasil dihapus', ['id' => $id]);
            return redirect()->route('pajak.index')->with('success', 'Data pajak berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::warning('Gagal hapus - data pajak tidak ditemukan', ['id' => $id]);
            return redirect('/pajak')->with('error', 'Data pajak tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus pajak', [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
