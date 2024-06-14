@extends('headerAdmin')
@section('container')
    <div class="container" style="margin-top: 15vh;">
        <div class="card" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">Riwayat Booking</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>                                
                                <th scope="col">No</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Jasa</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody id="tBody" class="table-group-divider">                            
                        
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection()

@section('scripts')
    <script>
        $(document).ready(function() {
            read();
        });

        function read() {
            var html = "";
            var no = 1;
            $.get("{{ route('getRiwayatTransaksi') }}", {}, function(data, status) {
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    html += "<tr>"
                    html += "<td>" + no + "</td>"
                    html += "<td>" + data[i].username + "</td>"
                    html += "<td>" + data[i].nama_jasa + "</td>"
                    html += "<td>" + data[i].jam_booking + "</td>"
                    html += "<td>" + data[i].tanggal_booking + "</td>"
                    html += "<td>" + data[i].harga_jasa_booking + "</td>"
                    html += "<td>" + data[i].metode_pembayaran + "</td>"                    
                    no++;
                }
                $('#tBody').html(html);
            })
        }
    </script>
@endsection()
