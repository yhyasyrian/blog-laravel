<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      @if(app()->getLocale() == "ar")
          dir="rtl"
      @else
          dir="ltr"
    @endif
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    @if(app()->getLocale() == "ar")
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    @else
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @endif
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {!! SEO::generate() !!}
</head>
<body @if(app()->getLocale() == "ar")
          class="font-[Noto_Kufi] antialiased"
      @else
          class="font-sans antialiased"
    @endif>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
    @if(session()->has('success'))
        <x-alert>
            {{session()->get('success')}}
        </x-alert>
    @endif
    <!-- Page Content -->
    <main class="py-4">
        {{ $slot }}
    </main>
</div>
@include('layouts.darkmode')
@include('layouts.footer')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script> --}}
</body>
</html>
