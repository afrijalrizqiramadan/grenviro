<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Grenviro Monitoring') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Grenviro Monitoring" name="description" />
        <meta content="Grenviro Monitoring" name="afrijal" />
        <meta content="{{csrf_token()}}" name="csrf-token" />
        <!-- App favicon -->
        @stack('style-css')
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">
        <link href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/js/chart.js')}}"></script>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


        @livewireStyles

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @livewireScripts

            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="//unpkg.com/alpinejs" defer></script>

            <x-livewire-alert::scripts />
            <footer class="footer">
                <div class="footer-wrap">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.smartcng.aiyothings.com/" target="_blank">Grenviro Monitoring </a>2024</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Making With Love</span>
                  </div>
                </div>
              </footer>
        </div>
        @stack('javascript')

    </body>
</html>
