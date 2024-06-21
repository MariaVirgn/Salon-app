@extends('headerUser')

@section('container')
   <div class="container d-flex justify-content-center" style="margin-top: 15vh;">
       <div class="card w-50 shadow-lg" style="border: none; border-radius: 10px;">
           <div class="card-header text-center" style="background: linear-gradient(90deg, #ff7e5f, #feb47b); color: white; border-radius: 10px 10px 0 0;">
               <h3 class="card-title mb-0">Edit Akun</h3>
           </div>
           <div class="card-body p-4" style="background-color: #fff5e1;">
               <div class="row justify-content-center">
                   <div class="col-md-8">
                       <input type="text" class="form-control mb-3" id="id_cust" hidden>
                       <div class="form-floating mb-3">
                           <input type="text" class="form-control" id="nama" placeholder="Nama">
                           <label for="nama">Nama</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="email" class="form-control" id="email" placeholder="E-mail">
                           <label for="email">E-mail</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="number" class="form-control" id="nomor" placeholder="Nomor Telephone">
                           <label for="nomor">Nomor Telephone</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                           <label for="alamat">Alamat</label>
                       </div>
                   </div>
               </div>
           </div>
           <div class="card-footer text-center" style="background-color: #f8f9fa; border-radius: 0 0 10px 10px;">
               <button class="btn btn-gradient" onclick="edit()">Simpan Perubahan</button>
           </div>
       </div>
   </div>

   <style>
       .card {
           transition: transform 0.2s, box-shadow 0.2s;
       }
       .card:hover {
           transform: translateY(-10px);
           box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
       }
       .form-floating>.form-control {
           border-radius: 0.25rem;
           background-color: #fef4e6;
       }
       .form-floating>label {
           color: #6c757d;
       }
       .btn-gradient {
           background: linear-gradient(90deg, #ff7e5f, #feb47b);
           border: none;
           color: white;
           padding: 10px 20px;
           border-radius: 30px;
           transition: background 0.3s;
       }
       .btn-gradient:hover {
           background: linear-gradient(90deg, #feb47b, #ff7e5f);
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
