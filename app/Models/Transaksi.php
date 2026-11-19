<?php

namespace App\Models;

class Transaksi
{
    public static function semua(): array
    {
        return [
            ['id' => 1,  'tanggal' => '2026-09-01', 'keterangan' => 'Penjualan harian',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 1500000],
            ['id' => 2,  'tanggal' => '2026-09-02', 'keterangan' => 'Beli bahan baku',       'jenis' => 'pengeluaran', 'kategori' => 'Bahan Baku',  'jumlah' => 600000],
            ['id' => 3,  'tanggal' => '2026-09-04', 'keterangan' => 'Gaji karyawan',         'jenis' => 'pengeluaran', 'kategori' => 'Gaji',        'jumlah' => 800000],
            ['id' => 4,  'tanggal' => '2026-09-06', 'keterangan' => 'Penjualan online',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 1200000],
            ['id' => 5,  'tanggal' => '2026-09-08', 'keterangan' => 'Listrik & air',         'jenis' => 'pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 250000],
            ['id' => 6,  'tanggal' => '2026-09-10', 'keterangan' => 'Iklan media sosial',    'jenis' => 'pengeluaran', 'kategori' => 'Pemasaran',   'jumlah' => 300000],
            ['id' => 7,  'tanggal' => '2026-09-13', 'keterangan' => 'Penjualan grosir',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 2500000],
            ['id' => 8,  'tanggal' => '2026-09-15', 'keterangan' => 'Beli kemasan',          'jenis' => 'pengeluaran', 'kategori' => 'Bahan Baku',  'jumlah' => 350000],
            ['id' => 9,  'tanggal' => '2026-09-18', 'keterangan' => 'Jasa katering',         'jenis' => 'pemasukan',   'kategori' => 'Jasa',        'jumlah' => 900000],
            ['id' => 10, 'tanggal' => '2026-09-25', 'keterangan' => 'Perawatan peralatan',   'jenis' => 'pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 200000],
            ['id' => 11, 'tanggal' => '2026-10-01', 'keterangan' => 'Penjualan harian',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 1800000],
            ['id' => 12, 'tanggal' => '2026-10-03', 'keterangan' => 'Beli bahan baku',       'jenis' => 'pengeluaran', 'kategori' => 'Bahan Baku',  'jumlah' => 900000],
            ['id' => 13, 'tanggal' => '2026-10-05', 'keterangan' => 'Gaji karyawan',         'jenis' => 'pengeluaran', 'kategori' => 'Gaji',        'jumlah' => 800000],
            ['id' => 14, 'tanggal' => '2026-10-08', 'keterangan' => 'Penjualan online',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 1600000],
            ['id' => 15, 'tanggal' => '2026-10-10', 'keterangan' => 'Listrik & air',         'jenis' => 'pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 280000],
            ['id' => 16, 'tanggal' => '2026-10-12', 'keterangan' => 'Iklan marketplace',     'jenis' => 'pengeluaran', 'kategori' => 'Pemasaran',   'jumlah' => 450000],
            ['id' => 17, 'tanggal' => '2026-10-15', 'keterangan' => 'Penjualan grosir',      'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 2200000],
            ['id' => 18, 'tanggal' => '2026-10-20', 'keterangan' => 'Jasa katering',         'jenis' => 'pemasukan',   'kategori' => 'Jasa',        'jumlah' => 1100000],
            ['id' => 19, 'tanggal' => '2026-10-24', 'keterangan' => 'Beli kemasan',          'jenis' => 'pengeluaran', 'kategori' => 'Bahan Baku',  'jumlah' => 400000],
            ['id' => 20, 'tanggal' => '2026-10-28', 'keterangan' => 'Sewa tempat',           'jenis' => 'pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 1000000],
            ['id' => 21, 'tanggal' => '2026-10-30', 'keterangan' => 'Penjualan akhir bulan', 'jenis' => 'pemasukan',   'kategori' => 'Penjualan',   'jumlah' => 1400000],
            ['id' => 22, 'tanggal' => '2026-10-31', 'keterangan' => 'Bonus karyawan',        'jenis' => 'pengeluaran', 'kategori' => 'Gaji',        'jumlah' => 300000],
        ];
    }

    public static function cariById(int $id): ?array
    {
        foreach (self::semua() as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
}