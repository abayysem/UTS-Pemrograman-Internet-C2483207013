@extends('layouts.app')
@section('title', 'Laporan Laba-Rugi')

@section('content')
<h1 class="mb-4 text-2xl font-bold">Laporan Laba-Rugi: {{ $judul }}</h1>

<div class="mb-6 flex flex-wrap gap-2">
    <a href="{{ route('laporan.labarugi') }}"
       class="rounded-md bg-white px-3 py-1.5 text-sm font-medium ring-1 ring-slate-300 hover:bg-slate-100">Semua</a>
    @foreach ($daftarBulan as $b)
        <a href="{{ route('laporan.labarugi.bulan', $b) }}"
           class="rounded-md bg-white px-3 py-1.5 text-sm font-medium text-indigo-600 ring-1 ring-indigo-600 hover:bg-indigo-50">{{ $b }}</a>
    @endforeach
</div>

<div class="max-w-2xl overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
    <dl class="divide-y divide-slate-100 text-sm">
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Total Pemasukan</dt><dd class="font-medium text-emerald-600">Rp {{ number_format($ringkasan['pemasukan'], 0, ',', '.') }}</dd></div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Total Pengeluaran</dt><dd class="font-medium text-rose-600">Rp {{ number_format($ringkasan['pengeluaran'], 0, ',', '.') }}</dd></div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Laba / Rugi</dt><dd class="font-bold">Rp {{ number_format($ringkasan['laba'], 0, ',', '.') }}</dd></div>
        <div class="flex justify-between px-5 py-3"><dt class="text-slate-500">Margin Laba</dt><dd>{{ $ringkasan['margin'] }}%</dd></div>
        <div class="flex justify-between px-5 py-3">
            <dt class="text-slate-500">Status</dt>
            <dd>
                @if ($ringkasan['laba'] > 0)
                    <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">{{ $ringkasan['status'] }}</span>
                @elseif ($ringkasan['laba'] < 0)
                    <span class="rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-medium text-rose-700">{{ $ringkasan['status'] }}</span>
                @else
                    <span class="rounded-full bg-slate-200 px-2.5 py-0.5 text-xs font-medium text-slate-700">{{ $ringkasan['status'] }}</span>
                @endif
            </dd>
        </div>
    </dl>
</div>
@endsection