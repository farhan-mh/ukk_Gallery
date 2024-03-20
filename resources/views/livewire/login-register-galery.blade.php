<div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error')}}
            </div>
            @endif
        </div>
    </div>
    <!-- register -->
    @if($registerForm)
    <form action="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" wire:model="nama" class="form-control">
                    @error('nama') <span class="text-danger error">{{$message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">email :</label>
                    <input type="email" wire:model="emailr" class="form-control">
                    @error('emailr') <span class="text-danger error">{{$message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Password :</label>
                    <input type="password" wire:model="passwordr" class="form-control">
                    @error('passwordr') <span class="text-danger error">{{$message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" wire:click.prevent="registerStore">Register</button>
            </div>
            <div class="col-md-12 text-start">
               Sudah Punya Akun  <a href=""class="text-primary" wire:click.prevent="register">Login</a>
            </div>
        </div>
    </form>
    @else
    <!-- login -->
    <form action="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email') <span class="text-danger error">{{$message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Password :</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password') <span class="text-danger error">{{$message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mt-2 text-center">
                <button class="btn btn-primary w-50 mb-3" wire:click.prevent="login">Login</button>
            </div>
            <div class="col-md-6 text-start">
                Belum Punya Akun <a href=""class="text-primary" wire:click.prevent="register">Register</a>
            </div>
        </div>
    </form>
    @endif
</div>

<script>
    Livewire.on('refreshPage', function () {
    if (window.location.href.includes('reload')) {
        location.reload();
    }
});

function kembali(){
    window.history.go(-1);
}
</script>
