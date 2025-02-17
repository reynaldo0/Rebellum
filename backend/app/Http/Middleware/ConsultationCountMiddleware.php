<?php

namespace App\Http\Middleware;

use App\Models\Consultation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsultationCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hitung jumlah konsultasi (sesuaikan dengan kondisi yang diperlukan)
        $consultationsCount = Consultation::count();

        // Bagikan ke semua view
        view()->share('consultationsCount', $consultationsCount);

        return $next($request);
    }
}
