@extends('layouts.app')
@section('title', 'Kategori ' . $kategori)

@section('content')
<h1 class="mb-6 text-2xl font-bold">Transaksi Kategori: {{ $kategori }}</h1>

@if (count($transaksi) === 0)
    <div class="rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-amber-800">
        Tidak ada transaksi untuk kategori ini.
    </div>
@else
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <tbody class="divide-y divide-slate-100">
                    @foreach ($transaksi as $t)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3">{{ $t['tanggal'] }}</td>
                        <td class="px-5 py-3">{{ $t['keterangan'] }}</td>
                        <td class="px-5 py-3">{{ ucfirst($t['jenis']) }}</td>
                        <td class="px-5 py-3">Rp {{ number_format($t['jumlah'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr class="bg-slate-50 font-semibold">
                        <td class="px-5 py-3" colspan="3">Total</td>
                        <td class="px-5 py-3">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection