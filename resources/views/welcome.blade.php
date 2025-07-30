<link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @csrf
    @if (session('message'))
        <div class="alert alert-danger text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container border border-dark rounded shadow p-4" style="max-width: 500px;">
        <form action="auth/warga" method="POST">
            @csrf
            <div class="d-flex justify-content-center align-items-center mb-4 gap-2">
                <i class="fa-solid fa-circle-user fa-2x"></i>
                <h2 class="mb-0">Login</h2>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<link rel="stylesheet" href="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}">
