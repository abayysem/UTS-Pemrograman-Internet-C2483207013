<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Transaksi::semua();

        return view('dashboard', [
            'ringkasan'  => $this->ringkasan($data),
            'terbaru'    => array_slice(array_reverse($data), 0, 5),
            'totalData'  => count($data),
        ]);
    }
}