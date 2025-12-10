<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50:  '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-slate-200
                   transform -translate-x-full md:translate-x-0
                   transition-transform duration-200 ease-in-out">

            <div class="flex h-16 items-center px-6 border-b border-slate-200">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <div class="h-9 w-9 rounded-xl bg-primary-500 flex items-center justify-center text-white text-lg font-semibold">
                        A
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Admin Panel</p>
                        <p class="text-xs text-slate-500">Control Center</p>
                    </div>
                </a>
            </div>

            <nav class="mt-4 px-3 space-y-1">
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-600' : 'text-slate-600 hover:bg-slate-100' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l9-9 9 9M4.5 10.5V21h5v-5.25a2.25 2.25 0 014.5 0V21h5V10.5" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                {{-- Users --}}
                <a href="{{ route('admin.users') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          {{ request()->routeIs('admin.users') ? 'bg-primary-50 text-primary-600' : 'text-slate-600 hover:bg-slate-100' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 19.128a9.012 9.012 0 005.25-8.379M4.5 10.75a9.012 9.012 0 005.25 8.379M9.75 9.75a2.25 2.25 0 104.5 0 2.25 2.25 0 00-4.5 0z" />
                    </svg>
                    <span>Users</span>
                </a>

                {{-- Settings --}}
                <a href="{{ route('admin.settings') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          {{ request()->routeIs('admin.settings') ? 'bg-primary-50 text-primary-600' : 'text-slate-600 hover:bg-slate-100' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M10.5 6h3l.75-2.25M10.5 18h3l.75 2.25M6 10.5v3L3.75 14.25M18 10.5v3l2.25.75M8.25 8.25l-1.5-1.5M15.75 15.75l1.5 1.5M15.75 8.25l1.5-1.5M8.25 15.75l-1.5 1.5" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>

            @auth
                <div class="mt-auto px-4 pb-6 pt-4 border-t border-slate-200">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-primary-500 text-white flex items-center justify-center text-sm font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900 truncate max-w-[130px]">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    Administrator
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md border border-slate-200
                                           px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </aside>

        {{-- Overlay mobile --}}
        <div id="sidebar-backdrop"
             class="fixed inset-0 z-30 bg-slate-900/40 backdrop-blur-sm md:hidden hidden"></div>

        {{-- Main content --}}
        <div class="flex-1 flex flex-col md:ml-64">

            {{-- Topbar --}}
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8">
                <div class="flex items-center gap-3">
                    {{-- Tombol toggle sidebar di mobile --}}
                    <button id="sidebar-toggle"
                            class="inline-flex md:hidden items-center justify-center rounded-md border border-slate-200
                                   p-2 text-slate-600 hover:bg-slate-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-400">
                            @yield('subtitle', 'Overview')
                        </p>
                        <h1 class="text-lg font-semibold text-slate-900">
                            @yield('header', 'Dashboard')
                        </h1>
                    </div>
                </div>

                @auth
                    <div class="hidden md:flex items-center gap-3">
                        <span class="text-xs text-slate-500">Logged in as</span>
                        <span class="text-sm font-medium text-slate-800">
                            {{ auth()->user()->name }}
                        </span>
                    </div>
                @endauth
            </header>

            {{-- Content --}}
            <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Script kecil untuk toggle sidebar di mobile --}}
    <script>
        const sidebar      = document.getElementById('sidebar');
        const backdrop     = document.getElementById('sidebar-backdrop');
        const toggleButton = document.getElementById('sidebar-toggle');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }

        if (toggleButton) {
            toggleButton.addEventListener('click', () => {
                const isHidden = sidebar.classList.contains('-translate-x-full');
                isHidden ? openSidebar() : closeSidebar();
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', closeSidebar);
        }
    </script>
</body>
</html>
