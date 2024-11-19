@extends('headerUser')

@section('container')
<div class="container" style="margin-top: 15vh;">
    <div class="card shadow-lg card-custom">
        <div class="card-header text-center header-custom">
            <h3 class="card-title mb-0" style="font-weight: bold;">Treatment</h3>
        </div>
        <div class="card-body body-custom">
            <table id="example1" class="table table-hover table-custom">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <!-- Isi tabel akan dimuat di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header header-custom-modal">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control mb-3" id="idJasa" hidden>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" placeholder="Nama">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomor" placeholder="Nomor">
                            <label for="nomor">Nomor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" id="jam" placeholder="Jam Booking">
                            <label for="jam">Jam Booking</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl" placeholder="Tanggal">
                            <label for="tgl">Tanggal</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="pembayaran" name="pembayaran">
                                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                <option value="Dana">Dana</option>
                                <option value="Bank">Bank</option>
                                <option value="Gopay">Gopay</option>
                            </select>
                            <label for="pembayaran">Metode Pembayaran</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahBooking()">Pesan</button>
            </div>
        </div>
    </div>
</div>
<script>
        window.onload = function() {
            const backgrounds = [
                '/img/home1.png',
                '/img/home2.png',
                '/img/home3.png',
                '/img/home4.png'
            ];

            let currentIndex = 0;
            setInterval(() => {
                document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
                document.body.style.transition = 'background-image 1s ease-in-out';
                currentIndex = (currentIndex + 1) % backgrounds.length;
            }, 5000);
        };
    </script>

<style>
    .card-custom {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        width: 80%;
        margin: 0 auto;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .header-custom {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
        color: white;
        border-radius: 10px 10px 0 0;
        font-family: 'Arial', sans-serif;
    }

    .body-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 0 0 10px 10px;
        padding: 20px;
        color: white;
    }

    .table-custom {
        width: 100%;
        background-color: transparent;
    }

    .thead-dark {
        background-color: rgba(34, 34, 34, 0.9);
        color: white;
    }

    .modal-custom {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 10px;
    }

    .header-custom-modal {
        background: linear-gradient(90deg, #ff7e5f, #feb47b);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .form-floating > .form-control, .form-floating > .form-select {
        border-radius: 0.25rem;
        background-color: #fef4e6;
    }

    .form-floating > label {
        color: #6c757d;
    }

    .btn-primary {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #2575fc, #6a11cb);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        transition: background 0.3s;
    }

    .btn-secondary:hover {
        background: #565e64;
    }

    .modal-footer {
        background-color: #f8f9fa;
        border-radius: 0 0 10px 10px;
    }
</style>
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {
            read();
        });

        function read() {
            var html = "";
            $.get("{{ route('read_jasa') }}", {}, function(data, status) {
                for (let i = 0; i < data.length; i++) {
                    html += "<tr>"
                    html += "<td>"+data[i].id_jasa+"</td>"
                    html += "<td>"+data[i].nama_jasa+"</td>"
                    html += "<td>"+data[i].harga_jasa+"</td>"                    
                    html += "<td><button class='btn btn-primary' onclick='showForm("+data[i].id_jasa+")'>Pesan</button></td>"                    
                    html +="</tr>"                                        
                }
                $('#tbody').html(html);
            })
        }

        function showForm(id) {
            $('#modalPesan').modal('show');
            var url = "{{ route('formBooking', ':id') }}";
            url = url.replace(':id', id);

            $.get(url, {}, function(data, status) {
                console.log(data);
                $('#idJasa').val(id);
                $('#nama').val(data.username);
                $('#nomor').val(data.nomor_cust);
                $('#alamat').val(data.alamat);
            });
        }

        function tambahBooking() {
            var id = $('#idJasa').val();
            var jam = $('#jam').val();
            var tgl = $('#tgl').val();            
            var pembayaran = $('#pembayaran').val();            

            var url = "{{ route('tambahBooking', ':id') }}";
            url = url.replace(':id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                method: "POST", 
                data: {
                    'jam':jam,
                    'tgl':tgl,
                    'pembayaran':pembayaran
                },
                success: function(data, status) {                    
                    read();   
                    $("#modalPesan").modal("hide");
                    Swal.fire({
                    title: "Pesanan anda sudah ditambahkan!",
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(/images/trees.png)",
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/img/nyan-cat.gif")
                        left top
                        no-repeat
                    `
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });       
            
        }
    </script>
@endsection()
