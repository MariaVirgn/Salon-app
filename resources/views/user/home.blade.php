@extends('headerUser')

@section('container')
    <div class="container" style="margin-top: 15vh">
        <div class="card" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">Daftar Jasa</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" >Nama Jasa</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="table-group-divider">
                
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <!-- Modal -->
    <div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mb-3" id="idJasa" hidden>
                            <input type="text" class="form-control mb-3" placeholder="Nama" id="nama">
                            <input type="text" class="form-control mb-3" placeholder="Nomor" id="nomor">
                            <input type="text" class="form-control mb-3" placeholder="Alamat" id="alamat">
                            <input type="time" class="form-control mb-3" placeholder="Jam Booking" id="jam">
                            <input type="date" class="form-control mb-3" placeholder="Tanggal" id="tgl">
                            <select class="form-control mb-2" id="pembayaran" name="pembayaran">
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                            </select>
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
@endsection()

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
                    alert('Tambah Data Pesanan Sukses')
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });       
            
        }
    </script>
@endsection()
