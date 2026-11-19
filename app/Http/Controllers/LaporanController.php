<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function labaRugi(?string $bulan = null)
    {
        $semua = Transaksi::semua();
        $data  = $bulan ? $this->filterBulan($semua, $bulan) : $semua;

        return view('laporan.laba-rugi', [
            'judul'       => $bulan ? $this->namaBulan($bulan) : 'Seluruh Periode',
            'ringkasan'   => $this->ringkasan($data),
            'daftarBulan' => $this->daftarBulan($semua),
        ]);
    }

    public function analisis()
    {
        $semua = Transaksi::semua();
        $kategori = $this->pengeluaranPerKategori($semua);

        // Perbandingan per bulan
        $perBulan = [];
        foreach ($this->daftarBulan($semua) as $bulan) {
            $perBulan[] = ['nama' => $this->namaBulan($bulan)] + $this->ringkasan($this->filterBulan($semua, $bulan));
        }

        // Selisih bulan terakhir vs sebelumnya
        $perubahan = null;
        if (count($perBulan) >= 2) {
            $akhir = $perBulan[count($perBulan) - 1];
            $awal  = $perBulan[count($perBulan) - 2];
            $perubahan = [
                'selisih'    => $akhir['laba'] - $awal['laba'],
                'persentase' => $awal['laba'] != 0
                    ? round((($akhir['laba'] - $awal['laba']) / abs($awal['laba'])) * 100, 2)
                    : 0,
                'dari' => $awal['nama'],
                'ke'   => $akhir['nama'],
            ];
        }

        $ringkasan = $this->ringkasan($semua);
        $rasio = $ringkasan['pemasukan'] > 0
            ? round(($ringkasan['pengeluaran'] / $ringkasan['pemasukan']) * 100, 2)
            : 0;

        if ($ringkasan['pemasukan'] == 0) {
            $kondisi = 'Tidak ada pemasukan, kondisi keuangan tidak dapat dinilai.';
        } elseif ($rasio < 60) {
            $kondisi = 'Sehat: pengeluaran terkendali.';
        } elseif ($rasio <= 90) {
            $kondisi = 'Waspada: pengeluaran cukup besar dibanding pemasukan.';
        } else {
            $kondisi = 'Kritis: pengeluaran hampir atau melebihi pemasukan.';
        }

        return view('laporan.analisis', [
            'kategori'   => $kategori,
            'terbesar'   => $kategori[0] ?? null,
            'perBulan'   => $perBulan,
            'perubahan'  => $perubahan,
            'ringkasan'  => $ringkasan,
            'rasio'      => $rasio,
            'kondisi'    => $kondisi,
        ]);
    }
}