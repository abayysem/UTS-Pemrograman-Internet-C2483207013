<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index', ['transaksi' => Transaksi::semua()]);
    }

    public function show(int $id)
    {
        $transaksi = Transaksi::cariById($id);
        abort_if($transaksi === null, 404, 'Transaksi tidak ditemukan');

        return view('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function perKategori(string $kategori)
    {
        $data = array_values(array_filter(
            Transaksi::semua(),
            fn ($t) => strtolower($t['kategori']) === strtolower($kategori)
        ));

        return view('transaksi.kategori', [
            'kategori'  => $kategori,
            'transaksi' => $data,
            'total'     => array_sum(array_column($data, 'jumlah')),
        ]);
    }

    public function perPeriode(string $bulan)
    {
        $data = $this->filterBulan(Transaksi::semua(), $bulan);

        return view('transaksi.periode', [
            'bulan'      => $bulan,
            'namaBulan'  => $this->namaBulan($bulan),
            'transaksi'  => $data,
            'ringkasan'  => $this->ringkasan($data),
            'daftarBulan'=> $this->daftarBulan(Transaksi::semua()),
        ]);
    }
}