@extends('layouts.admin')

@section('title', 'Dashboard - Admin')
@section('header', 'Dashboard')
@section('subtitle', 'Ringkasan singkat aktivitas sistem')

@section('content')
    {{-- Baris pertama: greeting --}}
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-slate-900">
            Selamat datang kembali,
            <span class="text-primary-600">
                {{ auth()->user()->name }}
            </span>
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            Berikut ringkasan singkat kondisi sistem dan aktivitas terbaru.
        </p>
    </div>

    {{-- Kartu statistik --}}
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl bg-white border border-slate-200 p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Total Users
                </p>
                <span class="inline-flex items-center rounded-full bg-primary-50 px-2 py-0.5 text-[11px] font-medium text-primary-600">
                    +12 this week
                </span>
            </div>
            <p class="mt-3 text-2xl font-semibold text-slate-900">
                1,240
            </p>
            <p class="mt-1 text-xs text-emerald-600">
                ▲ 8.5% dibanding bulan lalu
            </p>
        </div>

        <div class="rounded-xl bg-white border border-slate-200 p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Active Today
                </p>
                <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                    Live
                </span>
            </div>
            <p class="mt-3 text-2xl font-semibold text-slate-900">
                87
            </p>
            <p class="mt-1 text-xs text-slate-500">
                56% dari total user aktif
            </p>
        </div>

        <div class="rounded-xl bg-white border border-slate-200 p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    New Registrations
                </p>
                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-700">
                    24h terakhir
                </span>
            </div>
            <p class="mt-3 text-2xl font-semibold text-slate-900">
                32
            </p>
            <p class="mt-1 text-xs text-slate-500">
                Rata-rata 28/hari minggu ini
            </p>
        </div>

        <div class="rounded-xl bg-white border border-slate-200 p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    System Status
                </p>
                <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                    Healthy
                </span>
            </div>
            <p class="mt-3 text-2xl font-semibold text-slate-900">
                99.9%
            </p>
            <p class="mt-1 text-xs text-slate-500">
                Uptime 30 hari terakhir
            </p>
        </div>
    </div>

    {{-- Baris kedua: grafik & tabel --}}
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        {{-- Kiri: placeholder grafik --}}
        <div class="lg:col-span-2 rounded-xl bg-white border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-semibold text-slate-900">
                        Traffic Overview
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Perkembangan kunjungan 7 hari terakhir
                    </p>
                </div>
                <select
                    class="rounded-md border-slate-200 text-xs text-slate-600 focus:border-primary-500 focus:ring-primary-500">
                    <option>7 hari</option>
                    <option>30 hari</option>
                    <option>1 tahun</option>
                </select>
            </div>

            {{-- Placeholder grafik / chart --}}
            <div
                class="mt-3 h-56 rounded-lg border border-dashed border-slate-200
                       flex items-center justify-center text-xs text-slate-400">
                Area grafik (bisa diisi nanti dengan chart library)
            </div>
        </div>

        {{-- Kanan: tabel aktivitas / users --}}
        <div class="rounded-xl bg-white border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-semibold text-slate-900">
                        Latest Users
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">
                        5 pendaftar terbaru
                    </p>
                </div>
            </div>

            <div class="space-y-3">
                @foreach (['Raka Mahendra', 'Siti Aulia', 'Dewi Permata', 'Andi Pratama', 'Guest User'] as $name)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-semibold text-slate-700">
                                {{ strtoupper(substr($name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">
                                    {{ $name }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    Registered just now
                                </p>
                            </div>
                        </div>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[11px] text-slate-600">
                            User
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Baris ketiga: quick actions --}}
    <div class="mt-8">
        <h3 class="text-sm font-semibold text-slate-900 mb-3">
            Quick Actions
        </h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.users') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-primary-500 px-4 py-2 text-sm font-medium text-white hover:bg-primary-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah / Kelola User
            </a>

            <a href="{{ route('admin.settings') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 6h3l.75-2.25M10.5 18h3l.75 2.25M6 10.5v3L3.75 14.25M18 10.5v3l2.25.75" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                Pengaturan Sistem
            </a>
        </div>
    </div>
@endsection
