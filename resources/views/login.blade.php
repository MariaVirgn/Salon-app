<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="./img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <style>
        body {
            background: url('/img/backlog.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .card {
            max-width: 400px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        .btn-login {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .btn-login:hover {
            background-color: #555;
        }

        .form-control {
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 1rem;
            padding: 0.75rem;
        }

        .footer-text {
            font-size: 0.9rem;
            color: #666;
        }

        .footer-text a {
            color: #4285F4;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Trigger SweetAlert2 when login fails -->
    @if($errors->has('login_failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Username atau Password salah",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
<<<<<<< HEAD
        </script>
    @endif
    
=======
        </script>
@endif

>>>>>>> c7cea2f3f4702fc4e22bd8bd9094ee181395307e
    <div class="container-flex">
        <div class="card">
            <h2 class="card-title">Login untuk melanjutkan</h2>
            <p>Masuk menggunakan akun Anda</p>
            <form action="/login" method="POST">
                @csrf
                <input type="text" class="form-control" id="username" name="username" placeholder="User" required>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn-login">LOGIN</button>
            </form>
            <div class="footer-text mt-3">
                Belum punya akun? <a href="register">Buat akun</a><br>
                Lupa nama pengguna atau kata sandi Anda? <a href="forgot-password">Pulihkan Akun</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
