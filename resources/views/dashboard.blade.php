@extends('layouts.app')
@section('title', 'Ringkasan')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Ringkasan Keuangan</h1>

<div class="mb-8 grid gap-4 md:grid-cols-3">
    <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Total Pemasukan</p>
        <p class="mt-1 text-2xl font-bold text-emerald-600">Rp {{ number_format($ringkasan['pemasukan'], 0, ',', '.') }}</p>
    </div>
    <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Total Pengeluaran</p>
        <p class="mt-1 text-2xl font-bold text-rose-600">Rp {{ number_format($ringkasan['pengeluaran'], 0, ',', '.') }}</p>
    </div>
    <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Laba / Rugi</p>
        <p class="mt-1 text-2xl font-bold {{ $ringkasan['laba'] >= 0 ? 'text-indigo-600' : 'text-rose-600' }}">
            Rp {{ number_format($ringkasan['laba'], 0, ',', '.') }}
        </p>
        <p class="mt-1 text-sm text-slate-500">{{ $ringkasan['status'] }}</p>
    </div>
</div>

<div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <div class="border-b border-slate-200 px-5 py-3 font-semibold">5 Transaksi Terbaru</div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3">Keterangan</th>
                    <th class="px-5 py-3">Jenis</th>
                    <th class="px-5 py-3">Jumlah</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($terbaru as $t)
                <tr class="hover:bg-slate-50">
                    <td class="px-5 py-3">{{ $t['tanggal'] }}</td>
                    <td class="px-5 py-3">{{ $t['keterangan'] }}</td>
                    <td class="px-5 py-3">
                        @if ($t['jenis'] === 'pemasukan')
                            <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">Pemasukan</span>
                        @else
                            <span class="rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">Pengeluaran</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">Rp {{ number_format($t['jumlah'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3 text-right">
                        <a href="{{ route('transaksi.show', $t['id']) }}" class="font-medium text-indigo-600 hover:underline">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection