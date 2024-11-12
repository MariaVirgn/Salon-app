@extends('headerUser')

@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Hair</title>
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('container')
    <div class="hero">
        <div class="overlay">
            <h1>This is Your Muse</h1>
        </div>
    </div>
    <div class="container">
        <div class="intro-text">
            <h1><span style="color: white;">Celestial Studio Hair</span></h1>
            <p>Step into a world of <span style="font-weight: bold; color: white;">personalized services</span> that enhance your beauty and well-being.</p>
        </div>
        <div class="services">
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
        <div class="contact">
            <h2>Contact Us</h2>
            <p>123 Beauty Lane, Glamour City, XY 12345</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@studiohair.com</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            const backgrounds = [
                '/img/home1.jpg',
                '/img/home2.jpg',
                '/img/home3.jpg'
            ];

            let currentIndex = 0;
            setInterval(() => {
                document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
                document.body.style.transition = 'background-image 1s ease-in-out';
                currentIndex = (currentIndex + 1) % backgrounds.length;
            }, 5000);
        };
    </script>
@endsection

<style>
    body {
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        color: #333;
        min-height: 100vh;
        transition: background-image 1s ease-in-out;
        background-attachment: fixed;
    }

    .hero {
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url('/img/home1.jpg'); /* Replace with your background image */
        
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overlay h1 {
        color: white;
        font-size: 2.5em;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .navbar {
        position: absolute;
        top: 0;
        width: 100%;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 10px;
        box-shadow: none;
        transition: background-color 0.3s ease;
    }

    .navbar ul {
        list-style: none;
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .navbar ul li {
        margin: 0 15px;
    }

    .navbar ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .container {
        text-align: center;
        color: white
        padding: 60px 20px;
        border-radius: 10px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.85); /* Subtle white overlay for text readability */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .intro-text h1 {
        font-size: 2.8em;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .intro-text p {
        font-size: 1.2em;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        padding: 0 10px;
    }

    .services {
        margin-top: 50px;
    }

    .services h2 {
        font-size: 2em;
        color: #333;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .service-list {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .service-item {
        width: 280px;
        background-color: #fff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .service-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .service-item img {
        width: 100%;
        height: auto;
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .service-item h3 {
        font-size: 1.6em;
        color: #333;
        margin-bottom: 10px;
        text-transform: capitalize;
    }

    .service-item p {
        font-size: 1em;
        color: #666;
        padding: 0 10px;
    }

    .contact {
        margin-top: 60px;
    }

    .contact h2 {
        font-size: 2em;
        color: white;
        margin-bottom: 20px;
    }

    .contact p {
        font-size: 1em;
        color: white;
        line-height: 1.6;
    }
</style>
