<form wire:click.prevent="logout"> <!-- Menggunakan prevent untuk mencegah reload halaman -->
    @csrf
    <button type="button" onclick="confirmLogout()" class="btn btn-danger float-end">Logout</button>
</form>

<!--  -->