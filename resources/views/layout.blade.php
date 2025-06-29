<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        a { margin-right: 10px; }
        input { margin: 5px 0; }
    </style>
</head>
<body>
    @if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</body>
</html>