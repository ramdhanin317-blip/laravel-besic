    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
        {{-- navigasi --}}
        <nav class="navbar navbar-expand-lg bg-warning navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">UNITAMA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" href="{{ route('student.index') }}">Student</a>
                        <a class="nav-link active" href="{{ route('department.index') }}">Department</a>
                        <a class="nav-link active" href="{{ route('lecturer.index') }}">Lecturer</a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- page titile --}}
        <div class="bg-primary py-5 text-center text-white">
            <h1 class="fw-bold">{{ $title }}</h1>
        </div>

        {{-- main app --}}
        <div class="container my-5">
            {{ $slot }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>

    </html>
