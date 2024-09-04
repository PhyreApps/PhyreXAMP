<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="sunset">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            PhyreXAMP
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-base-300">

            {{-- BRAND --}}
            <div class="pl-4 pt-4">
                PhyreXAMP
            </div>

            {{-- MENU --}}
            <x-menu activate-by-route>

                <x-menu-separator title="Virtual Hosts" icon="o-server" />
                @php
                $virtualHosts = \App\Models\VirtualHost::all()
                @endphp

                @if($virtualHosts->count())
                    @foreach($virtualHosts as $virtualHost)
                        <x-menu-item title="{{ $virtualHost->name }}" icon="o-server" link="" />
                    @endforeach
                @else
                    <label class="px-4 block text-xs text-base-content">No Virtual Hosts</label>
                @endif

            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>

            <div class="mt-8">
                @livewire('xamp')
            </div>

            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    {{-- Include AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
