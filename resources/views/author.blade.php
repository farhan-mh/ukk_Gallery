@extends('layout.app')
@section('konten')

@forelse($ambil as $a)
@if($a->background)
<div class="jumbotron border-round-0 min-50vh"
	style="background-image:url({{ asset('storage/profil/'.$a->background) }});">
</div>
@else
<div class="jumbotron border-round-0 min-50vh"
	style="background-image:url(https://images.unsplash.com/photo-1522204657746-fccce0824cfd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=84b5e9bea51f72c63862a0544f76e0a3&auto=format&fit=crop&w=1500&q=80);">
</div>
@endif
<div class="container mb-4">
	<div class="d-flex">
	@if($a->avatar)
	<img src="{{ asset('storage/profil/'.$a->avatar) }}" class="mt-neg100 mb-4 rounded-circle" width="128">
	@else
	<img src="{{ asset('img/av.png') }}" class="mt-neg100 mb-4 rounded-circle" width="128">
	@endif
	<h3 class="ml-4">{{auth()->user()->name}}</h3>

	</div>

	<h1 class="font-weight-bold title"></h1>
	<p>
		{!! $a->deskripsi!!}
	</p>
	<div>
		<!--  -->
		<div class="d-flex">
			<!-- <a href="/upProfil"><button class="bn632-hover bn26">Edit Profil</button></a> -->
			<a href="/upProfil"><input type="button" value="Edit Profil" class="btn btn-info"></a>
			<!-- <a href="/UpdateProfil" ><button class="btn btn-primary"> Edit Profil </button></a> -->
			<a href="/up"><input type="button" value="Upload" class="btn btn-success mx-2"></a>
		</div>
		<!-- // -->

	</div>
</div>
@empty
<h6>Masih Kosong</h6>
@endforelse
<!-- --- -->
<div class="container-fluid mb-5">
	<div class="row">
		<div class="card-columns">
			<!-- konten -->
@forelse($data as $index => $dt)
    <div class="card card-pin">
        <img class="card-img" src="{{ asset('storage/posts/'.$dt->gambarUpload) }}" alt="Card image">
        <div class="overlay">
            <h2 class="card-title title">{{ $dt->judul }}</h2>
            <div class="more">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $index }}">
                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lihat </a>
            </div>
        </div>
    </div>

    <!-- Modal popup-->
    <div class="modal fade" id="exampleModalCenter{{ $index }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-body py-0">
                    <div class="d-block main-content">
                        <div class="d-flex container my-4">
                            <span>{{\Carbon\Carbon::parse($dt->tanggal)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</span>
                            <img src="{{ asset('svg/dots.svg') }}" alt="" class="dropdown-toggle ml-auto mr-2 d-block" type="button"data-bs-toggle="dropdown" aria-expanded="false">
                            
                            <div class="dropdown-center">
                                <ul class="dropdown-menu bg-secondary px-1">
                                
                                    <li class="">
                                     <form action="{{ route('up.edit', $dt->idpos) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary w-100" align="center">Edit</button>
                                        </form>
                                    </li>
                                    <li>
                                    <button type="button" class="btn btn-secondary w-100" align="center" onclick="hapusPostingan('{{ $dt->idpos }}')">Hapus</button>                                        
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- kotak hapus -->
                        <div style="width:15rem" id="kotak-hapus-{{ $dt->idpos }}" class="kotak-hapus z-3 position-absolute top-40 start-50 translate-middle d-none">
                            <label for="">Ingin Hapus Postingan ini ?</label>
                            <div class=" mt-3">
                                <button onclick="tutupHpus('{{ $dt->idpos }}')"  class="btn btn-warning float-start">Tidak</button>
                                <form action="{{ route('up.destroy', $dt->idpos) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-end" title="{{ $dt->idpos }}">YA  </button>
                                </form>
                            </div>
                        </div>
                        <!--  -->
                        <img src="{{ asset('storage/posts/'.$dt->gambarUpload) }}" alt="card image" class="img-fluid mx-auto d-block">
                        <div class="content-text p-4">
                            <!-- <p>idpos: {{ $dt->idpos }}</p>
                            <p>like {{ $dt->lk }}</p> -->
                            <h3 class="mb-4">{{ $dt->judul }}</h3>
                            <p class="mb-4">{!! $dt->deskripsiUpload !!}</p>
                            <div class="d-flex">
	   
                            @if(Auth::check())
                                <!-- Tombol untuk unlike -->
                                <form action="{{ route('uploads.unlike', $dt->idpos ) }}" method="POST" class="unlike-form" @unless($dt->userLiked) style="display: none;" @endunless>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="unlike-btn bg-white rounded border border-white" title="Unlike">
                                        <img src="{{ asset('svg/like.svg') }}" class="" alt="">
                                    </button>
                                </form>

                                <!-- Tombol untuk like -->
                                <form action="{{ route('uploads.like', $dt->idpos) }}" method="POST" class="like-form" @if($dt->userLiked) style="display: none;" @endif>
                                    @csrf
                                    <button type="submit" class="like-btn bg-white rounded border border-white" title="Like">
                                        <img src="{{ asset('svg/unlike.svg') }}" class="" alt="">
                                    </button>
                                </form>
                            @else
                            <!-- jika belum login -->
                                <form class="like-form" style="display: none;">
                                    @csrf
                                    <button type="submit" class="like-btn d-none" title="Like"  onclick="belumLoginn()"  >
                                        <img src="{{ asset('svg/unlike.svg') }}" class="" alt="">
                                    </button>
                                </form>
                            @endif

                                <span class="likes-count">{{ $dt->likes }}</span> likes
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
<div class="alert alert-info" role="alert">
    <span>belum ada postingan</span>
</div>
@endforelse


			<!-- end -->
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
    $(document).on('click', '.like-btn, .unlike-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var url = form.attr('action');

        $.ajax({
            type: form.attr('method'),
            url: url,
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Perbarui jumlah suka
                    form.siblings('.likes-count').text(response.likes_count);

                    // Toggle visibilitas tombol
                    form.toggle();
                    form.siblings('form').toggle();
                } else {
                    console.error('Gagal melakukan like/unlike.');
                }
                console.log(response);
            },
            error: function(error) {
                console.error('Terjadi kesalahan AJAX.');
            }
        });
    });
});

// tombol hapus
function hapusPostingan(id) {
    var kotak = document.getElementById("kotak-hapus-" + id);
    kotak.classList.remove("d-none");
}

function tutupHpus(id) {
    var kotak = document.getElementById("kotak-hapus-" + id);
    kotak.classList.add("d-none");
}

</script>



<!-- @endseciton -->