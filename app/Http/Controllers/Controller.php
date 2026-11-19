<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

abstract class Controller
{
    protected function hitungTotal(array $data, string $jenis): int
    {
        $total = 0;
        foreach ($data as $item) {
            if ($item['jenis'] === $jenis) {
                $total += $item['jumlah'];
            }
        }
        return $total;
    }

    protected function ringkasan(array $data): array
    {
        $pemasukan   = $this->hitungTotal($data, 'pemasukan');
        $pengeluaran = $this->hitungTotal($data, 'pengeluaran');
        $laba        = $pemasukan - $pengeluaran;

        // Penanganan nilai nol
        if ($pemasukan == 0 && $pengeluaran == 0) {
            $status = 'Belum ada transaksi';
            $margin = 0;
        } elseif ($pemasukan == 0) {
            $status = 'Rugi (tidak ada pemasukan)';
            $margin = 0;
        } else {
            $status = $laba > 0 ? 'Untung' : ($laba < 0 ? 'Rugi' : 'Impas');
            $margin = round(($laba / $pemasukan) * 100, 2);
        }

        return [
            'pemasukan'   => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'laba'        => $laba,
            'margin'      => $margin,
            'status'      => $status,
        ];
    }

    protected function pengeluaranPerKategori(array $data): array
    {
        $kelompok = [];
        foreach ($data as $item) {
            if ($item['jenis'] === 'pengeluaran') {
                $kelompok[$item['kategori']] = ($kelompok[$item['kategori']] ?? 0) + $item['jumlah'];
            }
        }
        arsort($kelompok);

        $total = array_sum($kelompok);
        $hasil = [];
        foreach ($kelompok as $kategori => $jumlah) {
            $hasil[] = [
                'kategori'   => $kategori,
                'jumlah'     => $jumlah,
                'persentase' => $total > 0 ? round(($jumlah / $total) * 100, 2) : 0,
            ];
        }
        return $hasil;
    }

    protected function filterBulan(array $data, string $bulan): array
    {
        return array_values(array_filter($data, fn ($t) => str_starts_with($t['tanggal'], $bulan)));
    }

    protected function daftarBulan(array $data): array
    {
        $bulan = [];
        foreach ($data as $item) {
            $bulan[substr($item['tanggal'], 0, 7)] = true;
        }
        $bulan = array_keys($bulan);
        sort($bulan);
        return $bulan;
    }

    protected function namaBulan(string $bulan): string
    {
        $nama = ['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
                 '07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
        [$tahun, $bln] = explode('-', $bulan);
        return $nama[$bln] . ' ' . $tahun;
    }
}