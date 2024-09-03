<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <body class="font-sans text-gray-900 antialiased">
              <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <div class="w-full  mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                  {{ $slot }}
                </div>
              </div>
            </body>
        </div>
    </body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const currentTheme = localStorage.getItem('theme') || 'default';
      document.documentElement.setAttribute('data-theme', currentTheme);
  
      const themeControllers = document.querySelectorAll('.theme-controller');
  
      themeControllers.forEach(controller => {
        controller.addEventListener('click', function () {
          const selectedTheme = this.getAttribute('data-set-theme');
          document.documentElement.setAttribute('data-theme', selectedTheme);
          localStorage.setItem('theme', selectedTheme);
        });
      });
    });
</script>