<!-- tess -->
@extends('layout.app')
@section('konten')

@forelse($dataa as $d)

        <div class="container ">
		<div class="kotak-detail-1 mt-5 mb-5 section">
            <div class="box d-flex p-3">

                <div class="col-6 mt-3" title="{{ $d->idUpload}}">
                   <img src="{{ asset('storage/posts/'.$d->gambarUpload) }}" width="100%" /> 
                </div>
                <div class="col-5 mt-3">
				<div class="d-flex">
                    <!-- masalah id, mungkin  -->
				<a href="{{ route('userLain',$d->id2) }}" style="text-decoration-none" >
				<!-- <img src="{{ asset('storage/profil/'.$d->avatar) }}" class="mb-4 rounded-circle" style="object-fit:cover" width="40"> -->
                @if($d->avatar)
                    <img src="{{ asset('storage/profil/'.$d->avatar) }}" class="mb-4 rounded-circle" style="object-fit:cover" width="40">
	            @else
	                <img src="{{ asset('img/av.png') }}"class="mb-4 rounded-circle" style="object-fit:cover" width="40">
	            @endif
                   <h4 class="mx-3">{{ $d->username }}<br />
				</a>
				</div>
				   <h3> {{ $d->judul }}</h3><br>
                   <h4> </h4><span> {{\Carbon\Carbon::parse($d->tanggal)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</span>
				   <hr>
                   <p>Deskripsi :<br />
                       {!! $d->deskripsiUpload !!}
                   </p>
                </div>
 @if(Auth::check())
    <!-- Tombol untuk unlike -->
    <form action="{{ route('uploads.unlike', $d->idUpload ) }}" method="POST" class="unlike-form" @unless($userLiked[$d->idUpload]) style="display: none;" @endunless>
        @csrf
        @method('DELETE')
        <button type="submit" class="unlike-btn bg-white rounded border border-white" title="Unlike">
            <img src="{{ asset('svg/like.svg') }}" class="" alt="">
        </button>
    </form>

    <!-- Tombol untuk like -->
    <form action="{{ route('uploads.like', $d->idUpload) }}" method="POST" class="like-form" @if($userLiked[$d->idUpload]) style="display: none;" @endif>
        @csrf
        <button type="submit" class="like-btn bg-white rounded border border-white" title="Like">
            <img src="{{ asset('svg/unlike.svg') }}" class="" alt="">
        </button>
    </form>
@else
<!-- jika belum login -->
    <form class="like-form" >
        @csrf
        <button type="submit" class="like-btn" title="Harus Login Dulu"  onclick="belumLoginn()"  >
            <img src="{{ asset('svg/unlike.svg') }}" class="" alt="">
        </button>
    </form>
@endif


	<span class="likes-count">{{ $d->likes }}</span> likes
            </div>
			<hr>
			<!-- <div id="comments" class="mt-4 p-3">
					<div id="disqus_thread">
					</div>
					<script type="text/javascript">
                        var disqus_shortname = 'demowebsite'; 
                        var disqus_developer = 0;
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
					<noscript>
					Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
					</noscript>
				</div> -->
        </div>
    </div>

	@empty
			<h1>Kosong</h1>
@endforelse

<section class="bg-gray200 pt-5 pb-5">

<!-- <divv class="container">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<article class="card">
			@forelse($dataa as $d)
			<img class="card-img-top mb-2" src="{{ asset('storage/posts/'.$d->gambarUpload) }}" alt="Card image">
			<div class="card-body">
				<h4>{{ $d->judul }}</h4>
				<br>
				<hr>
				<div>
				{{ $d->deskripsiUpload }}
				</div>
				Begin Comments -replace demowebsite with your own id
                ==================================================
				<div id="comments" class="mt-4">
					<div id="disqus_thread">
					</div>
					<script type="text/javascript">
                        var disqus_shortname = 'demowebsite'; 
                        var disqus_developer = 0;
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
					<noscript>
					Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
					</noscript>
				</div>
				End Comments
			</div>
			@empty
			<h1>error</h1>https://images.unsplash.com/photo-1518707399486-6d702a84ff00?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b5bb16fa7eaed1a1ed47614488f7588d&auto=format&fit=crop&w=500&q=60
@endforelse
			</article>
		</div>
	</div>
</divv> -->


</section>

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
function belumLoginn(){
    if(confirm('Anda Belum Login. Ingin Lanjut Kehalaman Login ? ༼ つ ◕_◕ ༽つ')){
        window.location.href = '/loginn';
    }else{

    }
}
</script>

@endsection