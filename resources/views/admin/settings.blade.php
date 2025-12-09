@extends('layouts.admin')

@section('title', 'Settings - Admin')
@section('header', 'Settings')
@section('subtitle', 'Pengaturan dasar aplikasi & akun admin')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        {{-- Kartu info aplikasi --}}
        <div class="lg:col-span-2 rounded-xl border border-slate-200 bg-white p-5">
            <h2 class="text-sm font-semibold text-slate-900">
                Pengaturan Aplikasi
            </h2>
            <p class="mt-1 text-xs text-slate-500">
                Ubah nama aplikasi, tagline, dan preferensi tampilan.
            </p>

            <form class="mt-5 space-y-4">
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Nama Aplikasi
                    </label>
                    <input type="text" class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm
                                              focus:border-primary-500 focus:ring-primary-500"
                           value="{{ config('app.name', 'UTS WEB') }}">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">
                        Tagline
                    </label>
                    <input type="text" class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm
                                              focus:border-primary-500 focus:ring-primary-500"
                           placeholder="Contoh: Panel kontrol aktivitas sistem">
                </div>

                <div class="flex items-center justify-between pt-2">
                    <div>
                        <p class="text-xs font-medium text-slate-700">
                            Mode Tampilan
                        </p>
                        <p class="text-[11px] text-slate-500">
                            (Dummy switch) – nanti bisa disambungkan ke dark mode.
                        </p>
                    </div>
                    <button type="button"
                            class="inline-flex h-6 w-11 items-center rounded-full bg-slate-200 px-0.5">
                        <span class="inline-block h-5 w-5 rounded-full bg-white shadow"></span>
                    </button>
                </div>

                <div class="pt-3">
                    <button type="submit"
                            class="inline-flex items-center rounded-md bg-primary-500 px-4 py-2 text-xs font-medium text-white
                                   hover:bg-primary-600">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Kartu akun admin --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5">
            <h2 class="text-sm font-semibold text-slate-900">
                Profil Admin
            </h2>
            <p class="mt-1 text-xs text-slate-500">
                Informasi singkat akun yang sedang login.
            </p>

            @auth
                <div class="mt-4 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-primary-500 text-white flex items-center justify-center text-sm font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-900">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-slate-500">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
            @endauth

            <div class="mt-5 border-t border-slate-100 pt-4 space-y-3">
                <button
                    type="button"
                    class="w-full rounded-md border border-slate-200 px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Ganti Password
                </button>
                <button
                    type="button"
                    class="w-full rounded-md border border-slate-200 px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Kelola Session Login
                </button>
            </div>
        </div>
    </div>
@endsection
