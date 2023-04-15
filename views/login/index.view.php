
<!DOCTYPE html>
<html>

    <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <script nonce="afa6d9f0-68e6-4b11-a969-198fe4a95e9f">(function(w,d){!function(cO,cP,cQ,cR){cO[cQ]=cO[cQ]||{};cO[cQ].executed=[];cO.zaraz={deferred:[],listeners:[]};cO.zaraz.q=[];cO.zaraz._f=function(cS){return function(){var cT=Array.prototype.slice.call(arguments);cO.zaraz.q.push({m:cS,a:cT})}};for(const cU of [ "track","set","debug" ]) cO.zaraz[cU]=cO.zaraz._f(cU);cO.zaraz.init=()=>{var cV=cP.getElementsByTagName(cR)[0],cW=cP.createElement(cR),cX=cP.getElementsByTagName("title")[0];cX&&(cO[cQ].t=cP.getElementsByTagName("title")[0].text);cO[cQ].x=Math.random();cO[cQ].w=cO.screen.width;cO[cQ].h=cO.screen.height;cO[cQ].j=cO.innerHeight;cO[cQ].e=cO.innerWidth;cO[cQ].l=cO.location.href;cO[cQ].r=cP.referrer;cO[cQ].k=cO.screen.colorDepth;cO[cQ].n=cP.characterSet;cO[cQ].o=(new Date).getTimezoneOffset();if(cO.dataLayer)for(const da of Object.entries(Object.entries(dataLayer).reduce(((db,dc)=>({...db[1],...dc[1]})))))zaraz.set(da[0],da[1],{scope:"page"});cO[cQ].q=[];for(;cO.zaraz.q.length;){const dd=cO.zaraz.q.shift();cO[cQ].q.push(dd)}cW.defer=!0;for(const de of[localStorage,sessionStorage])Object.keys(de||{}).filter((dg=>dg.startsWith("_zaraz_"))).forEach((df=>{try{cO[cQ]["z_"+df.slice(7)]=JSON.parse(de.getItem(df))}catch{cO[cQ]["z_"+df.slice(7)]=de.getItem(df)}}));cW.referrerPolicy="origin";cW.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(cO[cQ])));cV.parentNode.insertBefore(cW,cV)};["complete","interactive"].includes(cP.readyState)?zaraz.init():cO.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script> -->
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


        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="../../plugins/iCheck/icheck.min.js"></script>

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
