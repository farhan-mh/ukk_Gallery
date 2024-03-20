<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
<a class="navbar-brand font-weight-bolder mr-3" href="#"><img src="{{asset ('img/logoPNG3.png')}}"></a>
<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarsDefault">
	<ul class="navbar-nav mr-auto align-items-center">
		<form class="bd-search hidden-sm-down" method="get" action="{{ route('/cari') }}">
		@csrf
			<input type="text" class="form-control bg-graylight border-0 font-weight-bold" name="cari_pos" id="search-input" placeholder="Search..." autocomplete="off">
			<div class="dropdown-menu bd-search-results" id="search-results">
			</div>
		</form>
	</ul>
	<ul class="navbar-nav ml-auto align-items-center">
		<li class="nav-item">
		<a class="nav-link active" href="{{ route('/home') }}">Home</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="{{ route('lihatPost') }}">Post</a>
		</li>
		@if(auth()->check()) <!-- Periksa apakah pengguna sudah login -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/author')}}">
						<img class="rounded-circle mr-2" src="{{ $avatar }}" width="30">
                        <span class="align-middle"> {{ \Illuminate\Support\Str::limit(auth()->user()->name, $limit = 10, $end = '...') }}</span>
                    </a>
                </li>
				@else
				<li class="nav-item">
                    <a class="nav-link" href="{{route('/loginn')}}">
                        <span class="align-middle text-danger">Login</span>
                    </a>
                </li>
            @endif
			
			@if(Auth::check())
			<li class="nav-item">
        <img src="{{ asset('svg/dots.svg') }}" alt="" class="dropdown-toggle ml-auto mr-2 d-block" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="dropdown" style="z-index:5; position:absolute; right: 0; margin-right: 15%;"> 
            <ul class="dropdown-menu bg-danger">
                <button class="dropdown-item text-white bg-danger text-center" onclick="logoutConfirm()">Logout</button>
            </ul>
        </div>
			</li>
			@else
			@endif

			
			
	</ul>
	
	<div style="width:15rem" id="kotak-logout" class="kotak-logout z-3 position-absolute top-50 start-50 translate-middle d-none">
		<label for="">Ingin Logout ?</label>
		<div class=" mt-3">
		<button onclick="tutupLogout()"  class="btn btn-warning float-start">Batal</button>
		@livewire('logout')-
		</div>
	</div>
</div>
<script>
    function logoutConfirm() {
		var kotak = document.getElementById("kotak-logout");
			kotak.classList.remove("d-none");
        }
		function tutupLogout() {
		var kotak = document.getElementById("kotak-logout");
			kotak.classList.add("d-none");
        }
</script>
</nav>