@extends('headerUser')
@section('container')
    <div class="container d-flex justify-content-center" style="margin-top: 15vh">
        <div class="card w-50" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">Edit Akun</h3>
            </div>
            <div class="card-body text-center">
                <div class="row-md-5 d-flex justify-content-center">
                    <div class="col-7 mb-3">
                        <input type="text" class="form-control" id="id_cust" hidden>
                        <input type="text" class="form-control" id="nama" placeholder="Nama">
                        <input type="email" class="form-control mt-3" id="email" placeholder="E-mail">
                        <input type="number" class="form-control mt-3" id="nomor" placeholder="Nomor Telephone">
                        <input type="text" class="form-control mt-3" id="alamat" placeholder="Alamat">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary" onclick="edit()">Simpan Perubahan</button>
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
            $.get("{{ route('editAccount') }}", {}, function(data, status) {
                    $('#nama').val(data.username);
                    $('#email').val(data.email);
                    $('#nomor').val(data.nomor_cust);
                    $('#alamat').val(data.alamat);
            })
        }

        function edit() {
            var id_cust = $('#id_cust').val();
            var username = $('#nama').val();
            var nomor = $('#nomor').val();
            var alamat = $('#alamat').val();
            var email = $('#email').val();
            if (nomor.length >12) {
                alert('Panjang Nomor tidak boleh lebih 12');
                read();
            } else {
                $.ajax({
                    url: "{{ route('updateAccount') }}",
                    type: "POST",
                    data: {
                        username: username,
                        email: email,
                        nomor: nomor,
                        alamat: alamat,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Data berhasil diubah');
                        read(); 
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            }

        }
    </script>
@endsection()
