@extends('headerAdmin')
@section('container')
    <div class="container" style="margin-top: 15vh">
        <div class="card" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">Kelola Akun</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tBody" class="table-group-divider">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mb-3" id="id_cust" hidden>
                            <input type="text" class="form-control mb-3" placeholder="Nama" id="nama">
                            <input type="number" class="form-control mb-3" placeholder="Nomor" id="nomor" maxlength="12">
                            <input type="text" class="form-control mb-3" placeholder="Alamat" id="alamat">
                            <input type="email" class="form-control mb-3" placeholder="email" id="email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
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
            $.get("{{ route('getDaftarAkun') }}", {}, function(data, status) {
                for (let i = 0; i < data.length; i++) {
                    html += "<tr>"
                    html += "<td>" + data[i].id_cust + "</td>"
                    html += "<td>" + data[i].username + "</td>"
                    html += "<td>" + data[i].email + "</td>"
                    html += "<td>" + data[i].nomor_cust + "</td>"
                    html += "<td>" + data[i].alamat + "</td>"
                    html +=
                        "<td><button class='btn btn-warning' onclick='readById(" + data[i].id_cust +
                        ")'>Edit</button><button class='btn btn-danger ml-2' onclick ='hapus(" + data[i].id_cust +
                        ")'>Hapus</button></td>"
                    html += "</tr>"
                }
                $('#tBody').html(html);
            })
        }

        function readById(id) {
            $('#modalEdit').modal('show');
            var url = "{{ route('getCustomerById', ':id') }}";
            url = url.replace(':id', id);

            $.get(url, {}, function(data, status) {
                console.log(data);
                if (status === 'success') {
                    $('#id_cust').val(data.id_cust);
                    $('#nama').val(data.username);
                    $('#nomor').val(data.nomor_cust);
                    $('#alamat').val(data.alamat);
                    $('#email').val(data.email);

                } else {
                    alert('Gagal memuat data');
                }
            });
        }

        function edit() {
            var id_cust = $('#id_cust').val();
            var username = $('#nama').val();
            var nomor = $('#nomor').val();
            var alamat = $('#alamat').val();
            var email = $('#email').val();
            if(nomor.length >12){
                alert('Panjang nomor lebih dari 12');
            }else{
                $.ajax({
                    url: "{{ route('updateCustomer') }}",
                    method: "PUT",
                    data: {
                        id_cust: id_cust,
                        username: username,
                        nomor: nomor,
                        alamat: alamat,
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Data berhasil diubah');
                            $('#modalEdit').modal('hide');
                            read();
                        } else {
                            alert('Gagal mengedit data');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
        }
        }


        function hapus(id) {
            var url = "{{ route('deleteAkun', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data, status) {
                    if (status === 'success') {
                        alert('Akun Berhasil Dihapus');
                        read();
                    } else {
                        alert('Terjadi Kesalahan Saat Menghapus Akun');
                    }
                }
            });
        }
    </script>
@endsection()
