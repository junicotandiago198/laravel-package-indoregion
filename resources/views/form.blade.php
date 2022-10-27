<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Laravel - Indoregion</title>
  </head>
  <body>

    <div class="container">
        <div class="card p-4 mt-4">
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="">Provinsi</label>
                    <select class="form-control" id="provinsi">
                        <option>Pillih Provinsi...</option>
                        @foreach ($provinces as $provinsi)
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kabupaten</label>
                    <select class="form-control" id="kabupaten"></select>
                </div>
                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <select class="form-control" id="kecamatan"></select>
                </div>
                <div class="form-group">
                    <label for="">Desa</label>
                    <select class="form-control" id="desa"></select>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            $('#provinsi').change(function(){
                let id_provinsi = $('#provinsi').val();
                
                $.ajax({
                    type : 'POST',
                    url : "{{route('getkabupaten')}}",
                    data : {
                            _token: '{!! csrf_token() !!}',
                            id_provinsi:id_provinsi
                           },
                    cache : false,

                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

        $(function(){
            $('#kabupaten').change(function(){
                let id_kabupaten = $('#kabupaten').val();
                
                $.ajax({
                    type : 'POST',
                    url : "{{route('getkecamatan')}}",
                    data : {
                            _token: '{!! csrf_token() !!}',
                            id_kabupaten:id_kabupaten
                           },
                    cache : false,

                    success: function(msg){
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

        $(function(){
            $('#kecamatan').change(function(){
                let id_kecamatan = $('#kecamatan').val();
                
                $.ajax({
                    type : 'POST',
                    url : "{{route('getdesa')}}",
                    data : {
                            _token: '{!! csrf_token() !!}',
                            id_kecamatan:id_kecamatan
                           },
                    cache : false,

                    success: function(msg){
                        $('#desa').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

    </script>

  </body>
</html>