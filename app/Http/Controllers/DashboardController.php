<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use App\Models\Kendaraan;
use App\Models\Staff;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $jumlahPajak = Pajak::count();
            $jumlahKendaraan = Kendaraan::count();
            $jumlahStaff = Staff::count();
            $jumlahPembayaran = Pembayaran::count();

            Log::info('Dashboard diakses');

            return view('dashboard.index', compact(
                'jumlahPajak',
                'jumlahKendaraan',
                'jumlahStaff',
                'jumlahPembayaran'
            ));
        } catch (\Exception $e) {
            Log::error('Gagal menampilkan dashboard', ['error' => $e->getMessage()]);
            return redirect('/')->with('error', 'Gagal memuat dashboard.');
        }
    }
}
