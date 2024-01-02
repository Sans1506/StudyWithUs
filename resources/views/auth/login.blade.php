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
    <div class="container mt-7">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-light">
            <div class="card-header"><h4>Login</h4></div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('logout'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('logout')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <form method="POST" action="/login" class="needs-validation">
                @csrf
                <div class="form-group">
                    <ion-icon name="mail"></ion-icon>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                </div>
                <div class="form-group">
                <ion-icon name="lock-closed"></ion-icon>
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-light btn-lg btn-block" tabindex="3">
                    Login
                </button>
                </div>
            </form>
            <div class="register mt-5 text-muted text-center">
                Don't have an account? <a href="/register">Register</a>
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
