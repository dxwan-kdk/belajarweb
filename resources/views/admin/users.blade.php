@extends('layouts.admin')

@section('title', 'Users - Admin')
@section('header', 'Users')
@section('subtitle', 'Kelola data pengguna aplikasi')

@section('content')
    {{-- Header + action --}}
    <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-base font-semibold text-slate-900">
                Daftar Pengguna
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Menampilkan semua user yang terdaftar di sistem.
            </p>
        </div>

        <div class="flex flex-wrap gap-2">
            <input
                type="text"
                placeholder="Cari nama atau email..."
                class="h-9 w-56 rounded-md border border-slate-200 bg-white px-3 text-xs text-slate-700
                       placeholder:text-slate-400 focus:border-primary-500 focus:ring-primary-500" />

            {{-- kalau nanti ada route create user bisa diarahkan ke sana --}}
            <button
                type="button"
                class="inline-flex items-center gap-2 rounded-md bg-primary-500 px-3 py-2 text-xs font-medium text-white
                       hover:bg-primary-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah User
            </button>
        </div>
    </div>

    {{-- Tabel users --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <table class="min-w-full text-xs md:text-sm">
            <thead class="bg-slate-50">
                <tr class="text-slate-500">
                    <th class="px-4 py-3 text-left font-medium">#</th>
                    <th class="px-4 py-3 text-left font-medium">Name</th>
                    <th class="px-4 py-3 text-left font-medium">Email</th>
                    <th class="px-4 py-3 text-left font-medium">Created At</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $index => $user)
                    <tr class="hover:bg-slate-50/60">
                        <td class="px-4 py-3 text-slate-500">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center text-[11px] font-semibold text-slate-700">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-800">
                                        {{ $user->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-3 text-slate-500">
                            {{ optional($user->created_at)->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-slate-400 text-sm">
                            Belum ada user terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
