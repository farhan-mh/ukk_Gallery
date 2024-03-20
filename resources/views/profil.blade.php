@extends('layout.app')
@section('konten')

<!-- <h1>{ !! $profil->Deskrpisi !! }</h1> -->

<div class="container mt-5">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('upProfil.update', $ambilProfil->emailUser) }}" method="POST" enctype="multipart/form-data"> 
                            @csrf 
                            @method('PUT')
                          <div class="d-flex">
                          <div class="col-10">
                          <div class="form-group">
                                <label class="font-weight-bold">Nama</label> 
                                <input type="input" class="form-control @error('ubahNama') is-invalid @enderror" value="{{ old('ubahNama',$ambilNamaUser->name) }}" name="ubahNama"> <!-- error message untuk title -->
                                @error('ubahNama')
                                <div class="alert alert-danger mt-2">
                                      {{ $errors->first('ubahNama') }} 
                                </div> @enderror
                            </div>
                           <div class="form-group">
                                <label class="font-weight-bold">profil</label> 
                                <input type="file" class="form-control @error('avtr') is-invalid @enderror" name="avtr"> <!-- error message untuk title -->
                                @error('avtr')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">background</label> 
                                <input type="file" class="form-control @error('bg') is-invalid @enderror" name="bg"> <!-- error message untuk title -->
                                @error('bg')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="des"
                                 rows="5" placeholder="Masukkan Deskrpisi">{{ old('des',$ambilProfil->deskripsi) }}</textarea>
                                <!-- error message untuk content -->
                                @error('des')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <button type="reset" class="btn btn-md btn-secondary" onclick="back()">Kembali</button>
                            </form>
                           </div>
                           <div class="col-1">
                           <label class="font-weight-bold">Hapus</label> 
                            <form action="{{ route('hapusProfil', $ambilProfil->emailUser) }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                <div class=" cekbox-profil form-group">
                                     <input type="checkbox" name="hpsAvtr" value="{{ $ambilProfil->avatar }}" title="avatar: {{ $ambilProfil->avatar }}" id="checkbox1" onclick="checkButtonStatus()">
                                </div>
                                <div class=" cekbox-profil form-group">
                                    <input type="checkbox" name="hpsBg" value="{{ $ambilProfil->background }}" title="background: {{ $ambilProfil->background }}" id="checkbox2" onclick="checkButtonStatus()">
                                </div>
                                <div class=" cekbox-profil form-group">
                                    <input type="checkbox" name="hpsDes" value="{{ $ambilProfil->deskripsi }}" title="deskripsi: {{ $ambilProfil->deskripsi }}" id="checkbox3" onclick="checkButtonStatus()">
                                </div>
                                <div class="tombolHapusss">
                                    <button type="submit" class="btn btn-md btn-danger float-end" disabled id="tombolHapus">Hapus</button>
                                </div>
                            </form>
                           </div>
                           </div>

                                                       
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
        function checkButtonStatus() {
        var checkbox1Checked = document.getElementById('checkbox1').checked;
        var checkbox2Checked = document.getElementById('checkbox2').checked;
        var checkbox3Checked = document.getElementById('checkbox3').checked;

        var tombolHapus = document.getElementById('tombolHapus');

        // Jika salah satu checkbox terpilih, aktifkan tombol Hapus
        if (checkbox1Checked || checkbox2Checked || checkbox3Checked) {
            tombolHapus.removeAttribute('disabled');
        } else { 
            tombolHapus.setAttribute('disabled', 'disabled');
        }
    }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('des');
    </script>

@endsection