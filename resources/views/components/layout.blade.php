<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>CRUD Laravel 11</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tabler Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="d-flex flex-column h-100">
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top bg-primary shadow">
            <div class="container-fluid px-lg-5">
                <span class="navbar-brand text-white">
                    <img src="{{ asset('images/brand-laravel.svg') }}" class="align-top me-2" width="30" alt="Logo">
                    Aplikasi CRUD Laravel 11
                </span>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-shrink-0">
        <div class="container-fluid pt-5 px-lg-5">
            <div class="d-flex flex-column flex-lg-row mt-5 mb-3">
                <!-- judul halaman -->
                <div class="flex-grow-1 d-flex align-items-center">
                    <i class="ti ti-device-laptop fs-1 me-3"></i>
                    <h3 class="mb-0">Products</h3>
                </div>
                <!-- breadcrumbs -->
                <x-breadcrumb>{{ $breadcrumb }}</x-breadcrumb>
            </div>

            <!-- menampilkan konten sesuai halaman yang dipilih -->
            {{ $slot }}

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto bg-white shadow py-4">
        <div class="container-fluid px-lg-5">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2024 - <a href="https://github.com/handikatriarlan" target="_blank" class="text-brand text-decoration-none">handikatriarlan</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Sweetalert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // preview image sebelum diunggah
        if (document.getElementById('image') !== null) {
            document.getElementById('image').onchange = function() {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // preview image
                    document.getElementById("imagePreview").src = e.target.result;
                };

                reader.readAsDataURL(this.files[0]);
            };
        }

        // menampilkan pesan dengan sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "Failed!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>