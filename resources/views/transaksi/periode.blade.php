@extends('layouts.app')
@section('title', 'Periode ' . $namaBulan)

@section('content')
<h1 class="mb-4 text-2xl font-bold">Transaksi {{ $namaBulan }}</h1>

<div class="mb-6 flex flex-wrap gap-2">
    @foreach ($daftarBulan as $b)
        <a href="{{ route('transaksi.periode', $b) }}"
           class="rounded-md px-3 py-1.5 text-sm font-medium ring-1 ring-indigo-600
                  {{ $b === $bulan ? 'bg-indigo-600 text-white' : 'bg-white text-indigo-600 hover:bg-indigo-50' }}">
            {{ $b }}
        </a>
    @endforeach
</div>

@if (count($transaksi) === 0)
    <div class="rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-amber-800">
        Tidak ada transaksi pada periode ini.
    </div>
@else
    <div class="mb-6 grid gap-4 md:grid-cols-3">
        <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Pemasukan</p>
            <p class="text-lg font-bold text-emerald-600">Rp {{ number_format($ringkasan['pemasukan'], 0, ',', '.') }}</p>
        </div>
        <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Pengeluaran</p>
            <p class="text-lg font-bold text-rose-600">Rp {{ number_format($ringkasan['pengeluaran'], 0, ',', '.') }}</p>
        </div>
        <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">{{ $ringkasan['status'] }}</p>
            <p class="text-lg font-bold text-indigo-600">Rp {{ number_format($ringkasan['laba'], 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <tbody class="divide-y divide-slate-100">
                    @foreach ($transaksi as $t)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3">{{ $t['tanggal'] }}</td>
                        <td class="px-5 py-3">{{ $t['keterangan'] }}</td>
                        <td class="px-5 py-3">{{ $t['kategori'] }}</td>
                        <td class="px-5 py-3">Rp {{ number_format($t['jumlah'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection