<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <h1>haha</h1>

        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
