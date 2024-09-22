<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>
    <main class="min-h-screen bg-gray-100">
        @isset($header)
            <header class="bg-emerald-400 shadow">
                <div class="container mx-auto px-6 py-3 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <div>
            <!-- Sidebar -->
            <nav class="">
                <div class="container mx-auto px-6 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                        </div>
                    </div>
                </div>
            </nav>

            <section class="py-6">
                <div class="container mx-auto px-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </section>
        </div>
    </main>
</body>

</html>
