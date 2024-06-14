@extends('headerAdmin')

@section('container')
    <div class="container" style="margin-top: 15vh;">
        <div class="card" style="box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.333);">
            <div class="card-header">
                <h3 class="card-title">About</h3>
            </div>
            <div class="card-body">
                <div class="form-floating">
                    <input type="text" class="form-control" id="id" hidden>
                    <textarea class="form-control" placeholder="Isi Konten About" id="about" style="height: 250px"></textarea>
                    <label for="floatingTextarea2"></label>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-primary" onclick="simpan()">Simpan</button>
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
            $.get("{{ route('getAbout') }}", {}, function(data, status) {
                $('#id').val(data[0].id);
                $('#about').val(data[0].deskripsi);
            })
        }

        function simpan() {
            var id = $('#id').val();
            var deskripsi = $('#about').val();

            $.ajax({
                url: "{{ route('updateAbout') }}",
                type: "POST",
                data: {
                    id : id,
                    deskripsi: deskripsi,
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
    </script>
@endsection()
