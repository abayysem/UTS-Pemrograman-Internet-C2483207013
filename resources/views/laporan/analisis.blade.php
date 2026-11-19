@extends('layouts.app')
@section('title', 'Analisis Keuangan')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Analisis Pengeluaran &amp; Kondisi Keuangan</h1>

<div class="mb-4 rounded-lg border border-sky-200 bg-sky-50 px-4 py-3 text-sky-800">
    Rasio pengeluaran terhadap pemasukan: <b>{{ $rasio }}%</b>. {{ $kondisi }}
</div>

@if ($terbesar)
<div class="mb-8 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-amber-800">
    Kategori pengeluaran terbesar: <b>{{ $terbesar['kategori'] }}</b>
    (Rp {{ number_format($terbesar['jumlah'], 0, ',', '.') }}, {{ $terbesar['persentase'] }}%)
</div>
@endif

<h2 class="mb-3 text-lg font-semibold">Pengeluaran per Kategori</h2>
<div class="mb-8 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Jumlah</th>
                    <th class="px-5 py-3 w-1/2">Persentase</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($kategori as $k)
                <tr>
                    <td class="px-5 py-3">{{ $k['kategori'] }}</td>
                    <td class="px-5 py-3">Rp {{ number_format($k['jumlah'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-3 flex-1 overflow-hidden rounded-full bg-slate-200">
                                <div class="h-3 rounded-full bg-indigo-500" style="width: {{ $k['persentase'] }}%"></div>
                            </div>
                            <span class="w-14 text-right text-xs font-medium">{{ $k['persentase'] }}%</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<h2 class="mb-3 text-lg font-semibold">Perbandingan Antar Bulan</h2>
<div class="mb-4 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-3">Bulan</th>
                    <th class="px-5 py-3">Pemasukan</th>
                    <th class="px-5 py-3">Pengeluaran</th>
                    <th class="px-5 py-3">Laba/Rugi</th>
                    <th class="px-5 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($perBulan as $b)
                <tr class="hover:bg-slate-50">
                    <td class="px-5 py-3">{{ $b['nama'] }}</td>
                    <td class="px-5 py-3">Rp {{ number_format($b['pemasukan'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3">Rp {{ number_format($b['pengeluaran'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3">Rp {{ number_format($b['laba'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3">{{ $b['status'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if ($perubahan)
<p class="text-sm">
    Laba {{ $perubahan['ke'] }} dibanding {{ $perubahan['dari'] }}:
    <b class="{{ $perubahan['selisih'] >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
        {{ $perubahan['selisih'] >= 0 ? 'naik' : 'turun' }}
        Rp {{ number_format(abs($perubahan['selisih']), 0, ',', '.') }}
        ({{ $perubahan['persentase'] }}%)
    </b>
</p>
@endif
@endsection