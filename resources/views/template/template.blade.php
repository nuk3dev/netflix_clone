<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="bg-[#161618] text-white flex flex-col min-h-screen">
    <nav>
        @include('includes.navbar')
    </nav>

    <div class="container flex-grow">
        <section class="flex justify-center pt-4">
            @yield('content')
        </section>
    </div>

    <footer class="bg-black text-white py-4 text-center">
        © 2024 Hobo. All Rights Reserved.
    </footer>

    @vite('resources/js/script.js')
</body>
</html>
