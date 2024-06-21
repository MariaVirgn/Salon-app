@extends('headerUser')

@section('container')
    <div class="container d-flex justify-content-center" style="margin-top: 15vh;">
        <div class="card shadow-lg w-75" style="border: none; border-radius: 15px; background: linear-gradient(135deg, #833ab4 0%, #fd1d1d 50%, #fcb045 100%);">
            <div class="card-header text-center py-3" style="background-color: rgba(255, 255, 255, 0.8); color: #343a40; border-radius: 15px 15px 0 0;">
                <h2 class="card-title mb-0" style="font-weight: bold; font-size: 2.5rem;">Status <span style="color: #fd1d1d;">Pemesanan</span></h2>
            </div>
            <div class="card-body p-4" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 0 0 15px 15px;">
                <table id="example1" class="table table-bordered table-hover" style="border-collapse: separate; border-spacing: 0 10px;">
                    <thead style="background-color: #343a40; color: white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jasa</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                        <!-- Isi tabel akan dimuat di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(37, 117, 252, 0.1);
        }
        .card-header {
            border-bottom: none;
        }
        .card-body {
            border-top: 1px solid #dee2e6;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table th, .table td {
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            cekPesanan();
        });

        function cekPesanan() {
            var html ="";
            var no = 1;
            $.get("{{ route('cekPesanan') }}", {}, function(data, status) {
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    html += "<tr>"
                    html += "<td>" + no + "</td>"
                    html += "<td>" + data[i].username + "</td>"
                    html += "<td>" + data[i].nama_jasa + "</td>"
                    html += "<td>" + data[i].jam_booking + "</td>"
                    html += "<td>" + data[i].tanggal_booking + "</td>"
                    html += "<td>" + data[i].metode_pembayaran + "</td>"
                    if (data[i].val === "Y") {
                        html += "<td>Pesanan Diterima <i class='bi bi-check-circle-fill' style='color:green'></i></td>"
                        } else {
                        html += "<td>Menunggu Konfirmasi <i class='bi bi-hourglass-split'></i></td>"
                    }
                    html += "</tr>"

                    no++;
                }
                $('#tBody').html(html);
            });
        }
    </script>
@endsection()
