<?php

namespace App\Http\Middleware;

use App\Models\ConsultationDetail;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsultationDetailCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hitung jumlah konsultasi (sesuaikan dengan kondisi yang diperlukan)
        $consultationsDetailCount = ConsultationDetail::count();

        // Bagikan ke semua view
        view()->share('consultationsDetailCount', $consultationsDetailCount);

        return $next($request);
    }
}
