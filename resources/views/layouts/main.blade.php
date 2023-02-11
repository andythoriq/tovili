<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToVili | {{ $title ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <x-navbar>
        @slot('current'){{ $title ?? '' }}@endslot
        text-light fw-bolder bg-secondary rounded-5
    </x-navbar>
    <main class="container">
        <x-alert>pesan dari halaman {{ $title }}</x-alert>
        <x-descbox>
            {{ $title ?? 'Halaman ini' }}
            @slot('body'){{ $desc ?? '' }}@endslot
            @slot('tombol')@yield('tombol')@endslot
        </x-descbox>
        @yield('content')
        <x-footer>
            <span class="mb-3 mb-md-0 text-muted">&copy; {{ date('Y') }} ToViLi | {{ $title ?? '' }}</span>
        </x-footer>
        <script src="https://kit.fontawesome.com/68243230bc.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </main>
</body>
</html>
