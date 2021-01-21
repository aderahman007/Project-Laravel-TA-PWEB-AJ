<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
    <title>Login || Admin</title>
</head>

<body>
    <div class="flash-data-success" data-flashdata="{{Session::has('success')}}"></div>
    <div class="flash-data-error" data-flashdata="{{Session::has('error')}}"></div>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route('login')}}" method="post">
                            {{csrf_field()}}
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="Email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="{{route('UserIndex')}}" class="text-info">Kembali ke halaman utama</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const flashDataSeccess = $('.flash-data-success').data('flashdata');
        const flashDataError = $('.flash-data-error').data('flashdata');

        if (flashDataSeccess) {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "{{Session::get('success')}}",
            });

        }
        if (flashDataError) {
            Swal.fire({
                icon: 'Error',
                title: 'Gagal',
                text: "{{Session::get('error')}}",
            });

        }
    </script>
</body>

</html>