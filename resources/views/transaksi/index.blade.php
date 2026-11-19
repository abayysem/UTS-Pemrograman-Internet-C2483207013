@extends('layouts.app')
@section('title', 'Daftar Transaksi')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Daftar Transaksi</h1>

<div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-3">#</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3">Keterangan</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Jenis</th>
                    <th class="px-5 py-3">Jumlah</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($transaksi as $t)
                <tr class="hover:bg-slate-50">
                    <td class="px-5 py-3">{{ $t['id'] }}</td>
                    <td class="px-5 py-3">{{ $t['tanggal'] }}</td>
                    <td class="px-5 py-3">{{ $t['keterangan'] }}</td>
                    <td class="px-5 py-3">
                        <a href="{{ route('transaksi.kategori', $t['kategori']) }}" class="text-indigo-600 hover:underline">{{ $t['kategori'] }}</a>
                    </td>
                    <td class="px-5 py-3">
                        @if ($t['jenis'] === 'pemasukan')
                            <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">Pemasukan</span>
                        @else
                            <span class="rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">Pengeluaran</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">Rp {{ number_format($t['jumlah'], 0, ',', '.') }}</td>
                    <td class="px-5 py-3 text-right">
                        <a href="{{ route('transaksi.show', $t['id']) }}"
                           class="rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-indigo-700">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection