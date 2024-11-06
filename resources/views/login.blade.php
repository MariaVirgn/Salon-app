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
            background: url('/img/backlog.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            max-width: 400px;
            border: none;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
        }

        .card-header {
            background: linear-gradient(45deg, #ff7e5f, #feb47b);
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            margin-bottom: 0;
            font-size: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff7e5f, #feb47b);
            border: none;
            border-radius: 20px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #e66465, #9198e5);
        }

        .form-control {
            border-radius: 20px;
            font-size: 1rem;
        }

        .card-footer {
            background-color: rgba(255, 255, 255, 0.7);
            border-top: none;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        a {
            color: #007bff;
            font-weight: 600;
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
        </script>
    @endif
    <div class="container-flex">
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">LOGIN</h3>
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg mx-auto" id="username"
                            name="username" aria-describedby="emailHelp" placeholder="Username"
                            style="max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-lg mx-auto" id="password"
                            name="password" placeholder="Password" style="max-width: 300px;">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary w-25">LOGIN</button>
                    </div>
                    <div class="row m-2">
                        <a href="register" style="text-decoration:none;">Register</a>
                    </div>
                </div>
            </form>
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
