<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celestical Salon</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('/img/welcbanner.png') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
        }

        .navbar {
            
            padding: 15px 10px;
            box-shadow: none;
            transition: background-color 0.3s ease;
        }

        .navbar:hover {
            background-color: rgba(0, 0, 0, 0.7) !important;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-family: 'Brush Script MT', cursive;
            font-size: 2rem;
            color: #ffffff !important;
        }

        .navbar-brand img {
            margin-right: 10px;
            width: 50px;
            height: auto;
        }

        .nav-link {
            color: #ffffff !important;
            font-weight: bold;
            margin: 0 15px;
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #ffd700 !important;
            transform: scale(1.1);
        }

        .navbar-nav li::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #ffd700;
            bottom: -5px;
            left: 50%;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .navbar-nav li:hover::before {
            width: 100%;
            left: 0;
        }

        .btn-danger {
            transition: background-color 0.3s ease, border-color 0.3s ease;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .container {
            margin-top: 70px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            font-family: 'Brush Script MT', cursive;
            font-size: 3rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <span>Celestical Salon</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="Welcome">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu">Daftar Treatment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking">Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit-akun">Edit Akun</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger" onclick="logout()">Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function logout() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('logout') }}",
                method: "POST",
                data: {},
                success: function(response) {
                    window.location = "{{ route('login') }}";
                    Swal.fire({
                        title: 'Logout success!',
                        icon: 'success',
                        timer: 1500,
                        buttons: false,
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText);
                }
            })
        }
    </script>

    @yield('scripts')
</body>

</html>
