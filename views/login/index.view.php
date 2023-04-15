
<!DOCTYPE html>
<html>

    <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">

    </head>
    <body class="hold-transition login-page">

        <div class="login-box">

            <div class="login-logo">
                <a href="/"><b>Blog</b>S</a>
            </div>

            <div class="login-box-body">

                <form action="/login" method="post">

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo rememberValue('email')?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo rememberValue('password')?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback text-danger mt-2"> <?php echo $error ?? "" ?></span>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember_me" id="check"> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-block btn-flat">Sign In</button>
                        </div>

                    </div>
                </form>

                <a href="#">I forgot my password</a><br>
            </div>

        </div>

        <script src="/plugins/iCheck/icheck.min.js"></script>

        <script>
            $(function () {
                $('#check').iCheck({
                checkboxClass: 'icheckbox_square-black',
                radioClass: 'iradio_square-black',
                increaseArea: '30%' /* optional */
                });
            });
        </script>
    </body>
</html>
