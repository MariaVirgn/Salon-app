@extends('headerUser')

@section('container')
    <div class="container" style="margin-top: 15vh;">
        <div class="card" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">About</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 align-self-center">
                        <img src="./img/logo.png" class="img-fluid w-100 shadow">
                    </div>
                    <div class="col-8">
                        <p class="display-6 text-align-justify" id="about" style="text-align: justify"></p>
                    </div>
                </div>
                {{-- <p><strong id="about"></strong></p> --}}
            </div>
        </div>
@endsection()

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
