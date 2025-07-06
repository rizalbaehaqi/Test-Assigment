<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KomisiController extends Controller
{
    public function index()
    {
        $data = DB::table('penjualan')
            ->join('marketing', 'penjualan.marketing_id', '=', 'marketing.id')
            ->select(
                'marketing.name as marketing',
                DB::raw('DATE_FORMAT(penjualan.date, "%M") as bulan'),
                DB::raw('SUM(penjualan.grand_total) as omzet')
            )
            ->groupBy('marketing.name', DB::raw('MONTH(penjualan.date)'))
            ->get()
            ->map(function($item) {
                $omzet = $item->omzet;
                if ($omzet >= 500000000) {
                    $persen = 10;
                } elseif ($omzet >= 200000000) {
                    $persen = 5;
                } elseif ($omzet >= 100000000) {
                    $persen = 2.5;
                } else {
                    $persen = 0;
                }
                $komisi = $omzet * $persen / 100;
                return [
                    'marketing' => $item->marketing,
                    'bulan' => $item->bulan,
                    'omzet' => $omzet,
                    'komisi_persen' => $persen,
                    'komisi_nominal' => $komisi
                ];
            });

        return response()->json($data);
    }
}