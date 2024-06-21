@extends('headerUser')

@section('container')
    <div class="container mt-5">
        <div class="card border-0 shadow-lg rounded-lg w-75 mx-auto">
            <div class="card-body" style="background: linear-gradient(to right, #11998e, #38ef7d);">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <img src="./img/logo.png" class="img-fluid rounded-circle shadow-lg" alt="Salon Logo" style="width: 200px;">
                    </div>
                    <div class="col-md-8">
                        <h2 class="card-title mb-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #fff; font-weight: bold;">
                            Celestial Salon
                        </h2>
                        <p class="lead" style="font-family: 'Arial', sans-serif; color: #fff;">
                            Celestial Salon was founded with a vision to become a leading salon in providing high-quality beauty and self-care services to our clients. We are committed to delivering an unforgettable experience for every client by combining the expertise of our experienced therapists, the finest quality products, and a comfortable and soothing salon atmosphere.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-body {
            padding: 40px;
            border-radius: 15px;
        }
    </style>
@endsection




@section('scripts')
    <script>
        $(document).ready(function() {
            read();
        });

        function read() {
            $.get("{{ route('getAbout') }}", {}, function(data, status) {
                $('#about').text(data[0].deskripsi);
            })
        }
    </script>
@endsection()
