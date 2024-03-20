@extends('layout.app')
@section('konten')

<div class="container mt-5">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('up.store') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label> 
                                <input type="file" class="form-control @error('gambarUpload') is-invalid @enderror" name="gambarUpload"> <!-- error message untuk title -->
                                @error('gambarUpload')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group"> <label class="font-weight-bold">JUDUL</label> 
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" 
                            value="{{ old('judul') }}" placeholder="Masukkan Judul">
                                <!-- error message untuk title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                    rows="5" placeholder="Masukkan Deskrpisi">{{ old('deskripsi') }}</textarea>
                                <!-- error message untuk content -->
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <button type="reset" class="btn btn-md btn-secondary" onclick="back()">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function back(){
            window.history.go(-1)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>

@endsection