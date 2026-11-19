<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Keuangan UMKM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">

@php
    $menu = [
        ['Ringkasan',   route('dashboard'),                         'dashboard'],
        ['Transaksi',   route('transaksi.index'),                   'transaksi.index'],
        ['Per Periode', route('transaksi.periode', '2026-09'),      'transaksi.periode'],
        ['Per Kategori', route('transaksi.kategori', 'Penjualan'),  'transaksi.kategori'],
        ['Laba-Rugi',   route('laporan.labarugi'),                  'laporan.labarugi*'],
        ['Analisis',    route('laporan.analisis'),                  'laporan.analisis'],
    ];
@endphp

<nav class="bg-indigo-600 shadow">
    <div class="mx-auto flex max-w-6xl flex-col gap-2 px-4 py-3 md:flex-row md:items-center md:justify-between">
        <a href="{{ route('dashboard') }}" class="text-lg font-bold text-white">Keuangan UMKM</a>
        <div class="flex flex-wrap gap-1 text-sm">
            @foreach ($menu as [$label, $url, $pola])
                <a href="{{ $url }}"
                   class="rounded-md px-3 py-1.5 font-medium transition
                          {{ request()->routeIs($pola) ? 'bg-white text-indigo-700' : 'text-indigo-100 hover:bg-indigo-500' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

<main class="mx-auto max-w-6xl px-4 py-8">
    @yield('content')
</main>

<footer class="pb-8 text-center text-xs text-slate-400">
    Aplikasi Laporan Keuangan UMKM &copy; 2026
</footer>

</body>
</html>