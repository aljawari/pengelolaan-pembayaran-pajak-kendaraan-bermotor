<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJabatan
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user || $user->jabatan !== 'Petugas Pajak') {
            return response()->view('errors.restricted', [
                'message' => 'Maaf, Anda tidak memiliki akses ke halaman ini.'
            ]);
        }

        return $next($request);
    }
}
