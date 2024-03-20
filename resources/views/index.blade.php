@extends('layout.app')
@section('konten')

<section class="mt-4 mb-5">
<div class="container mb-4">
	<h3 class="font-weight-bold title">Explore</h3>
	<div class="row">
		<nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
		<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarsExplore">
			<!-- <ul class="navbar-nav">
				<li class="nav-item">
				<a class="nav-link" href="#">Lifestyle</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#">Food</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#">Travel</a>
				</li>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
				<div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Astronomy</a>
					<a class="dropdown-item" href="#">Nature</a>
					<a class="dropdown-item" href="#">Cooking</a>
					<a class="dropdown-item" href="#">Fashion</a>
					<a class="dropdown-item" href="#">Wellness</a>
				</div>
				</li>
			</ul> -->
		</div>
		</nav>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="card-columns">
		
@forelse($data as $d)
		<div class="card card-pin">
				<img class="card-img" src="{{ asset('storage/posts/'.$d->gambarUpload) }}" alt="Card image">
				<div class="overlay">
					<h2 class="card-title title">{{ $d->judul }}</h2>
					<div class="more">
						<a href="{{ route('lihat', $d->id) }}">
						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Lihat Detail </a>
					</div>
				</div>
			</div>
@empty
<h1>error</h1>
@endforelse
			
</section>
@endsection