<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Study With Us</title>
@include('style.css')
<link rel="stylesheet" href="/css/stylesheet.css">
</head>

<body>
<div id="app">
<section class="section">
    <div class="container mt-6">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-light">
            <div class="card-header"><h3>Register</h3></div>
            <div class="card-body">
                <form method="POST" action="/register">
                @csrf
                <div class="form-group">
                    <ion-icon name="person"></ion-icon>
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" tabindex="1" required autofocus>
                    @error('nama')
                        <div class="invalid-feedback alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="form-group">
                    <ion-icon name="mail"></ion-icon>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="2" required>
                    @error('email')
                        <div class="invalid-feedback alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                    <div class="form-group">
                    <ion-icon name="lock-closed"></ion-icon>
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="3" required>
                    @error('password')
                        <div class="invalid-feedback alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-light btn-lg btn-block" tabindex="4">
                    Register
                </button>
                </div>
            </form>
            <div class="login mt-5 text-muted text-center">
                have an account? <a href="/login">Login</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
</div>
@include('style.javascript')
</body>
</html>
