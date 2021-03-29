@extends('adminlte::page')

@section('title', 'Pengelolaan Buku')

@section('content_header')
    <h1>Pengelolaan Buku</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__('Pengelolaan Buku')}}
                    </div>
                    <div class="card-body">

                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i>Tambah Data</i></button>

                        <table class="table table-borderer" id="table-data">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>JUDUL</th>
                                    <th>PENULIS</th>
                                    <th>TAHUN</th>
                                    <th>PENERBIT</th>
                                    <th>COVER</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1;@endphp
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $book->judul }}</td>
                                        <td>{{ $book->penulis }}</td>
                                        <td>{{ $book->tahun}}</td>
                                        <td>{{ $book->penerbit}}</td>
                                        <td>
                                            @if ($book->cover !== null)
                                                <img src="{{asset('storage/cover_buku/'.$book->cover)}}" width="100px">
                                            @else
                                                [Gambar Tidak Tersedia]
                                            @endif
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModallabel">Tambah Data Buku</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" id="judul"required>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" name="penulis" id="penulis"required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="datetime" class="form-control" name="tahun" id="tahun"required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit"required>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" class="form-control" name="cover" Covercover"rCover
                    </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
