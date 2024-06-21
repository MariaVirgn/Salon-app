@extends('headerUser')

@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Hair</title>
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- estilo css -->
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('container')
    <div class="container" style="margin-top: 15vh; padding: 20px; border-radius: 10px;">
        <div class="intro-text" style="color: white;">
            <h1>Welcome to Celestial Studio Hair</h1>
            <p>Step into a world of personalized services that enhance your beauty and well-being.</p>
        </div>
        <div class="services" style="color: white;">
            <h2>Our Services</h2>
            <div class="service-list">
                <div class="service-item">
                    <img src="/img/haircut.jpg" alt="Haircut">
                    <h3>Haircut</h3>
                    <p>Professional haircut services tailored to your style.</p>
                </div>
                <div class="service-item">
                    <img src="/img/coloring.jpg" alt="Hair Coloring">
                    <h3>Hair Coloring</h3>
                    <p>High-quality hair coloring to give you the perfect look.</p>
                </div>
                <div class="service-item">
                    <img src="/img/spa.jpg" alt="Spa Treatment">
                    <h3>Spa Treatment</h3>
                    <p>Relaxing spa treatments to rejuvenate your body and mind.</p>
                </div>
            </div>
        </div>
        <div class="contact" style="color: white;">
            <h2>Contact Us</h2>
            <p>123 Beauty Lane, Glamour City, XY 12345</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@studiohair.com</p>
        </div>
    </div>
@endsection

<style>
    .container {
        text-align: center;
        background: url('/img/background-1.jpg') no-repeat center center;
        background-size: contain;
        padding: 20px;
        border-radius: 10px;
        min-height: 100vh;
    }
    .intro-text {
        margin-bottom: 30px;
    }
    .services {
        margin-top: 50px;
    }
    .service-list {
        display: flex;
        justify-content: center;
        gap: 20px;
    }
    .service-item {
        width: 200px;
    }
    .service-item img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .contact {
        margin-top: 50px;
    }
</style>
