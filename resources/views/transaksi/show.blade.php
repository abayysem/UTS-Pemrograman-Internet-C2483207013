@extends('layouts.app')
@section('title', 'Detail Transaksi')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Detail Transaksi #{{ $transaksi['id'] }}</h1>

<div class="max-w-xl overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <dl class="divide-y divide-slate-100 text-sm">
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Tanggal</dt><dd>{{ $transaksi['tanggal'] }}</dd></div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Keterangan</dt><dd>{{ $transaksi['keterangan'] }}</dd></div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Kategori</dt><dd>{{ $transaksi['kategori'] }}</dd></div>
        <div class="flex justify-between px-5 py-3">
            <dt class="text-slate-500">Jenis</dt>
            <dd>
                @if ($transaksi['jenis'] === 'pemasukan')
                    <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">Pemasukan</span>
                @else
                    <span class="rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">Pengeluaran</span>
                @endif
            </dd>
        </div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Jumlah</dt><dd class="font-semibold">Rp {{ number_format($transaksi['jumlah'], 0, ',', '.') }}</dd></div>
    </dl>
</div>

<a href="{{ route('transaksi.index') }}"
   class="mt-5 inline-block rounded-md bg-slate-200 px-4 py-2 text-sm font-medium hover:bg-slate-300">&larr; Kembali</a>
@endsection