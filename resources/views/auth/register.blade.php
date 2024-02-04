<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style-login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(style-login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">register disini!</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">register untuk melanjutkan</h3>
                        <form action="{{ route('register-proses')}}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{old('nama')}}">
                            </div>
                            @error('name')
                                <p>{{ $message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                            </div>
                            @error('email')
                            <p>{{ $message}}</p>
                        @enderror
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @error('password')
                            <p>{{ $message}}</p>
                        @enderror
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash;sudah punya akun? <a href="{{route('login')}}">Login</a>&mdash;</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="style-login/js/jquery.min.js"></script>
    <script src="style-login/js/popper.js"></script>
    <script src="style-login/js/bootstrap.min.js"></script>
    <script src="style-login/js/main.js"></script>

</body>

</html>
