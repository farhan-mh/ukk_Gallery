<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray200">
<div class="bg-secondary"><button onclick="kembali()"><-</button></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white"><h5 style="font-size: 23px;">Login</h5></div>
                    <div class="card-body">
                        @livewire('login-register-galery')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts


</script> 


</body>
</html>