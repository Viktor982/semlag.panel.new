<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Noping Administrativo</title>
    <meta name="description" content="">
    <META NAME="robots" CONTENT="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ manifest('/build/css/nptunnel.css') }}">
</head>
<body>
<div id="loading">
    <div class="svg-icon-loader">
        <img src="/build/images/svg-loaders/pacman.svg" width="120" alt="">
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
    }

</style>

<div class="center-vertical">
    <div class="center-content">
        <form class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin" method="POST" action="{{ route('auth.authenticate') }}">
            @if(isset($_GET['redirect']))
                <input type="hidden" name="redirect" value="{{ $_GET['redirect'] }}">
            @endif
            <h3 class="text-center pad25B font-gray text-transform-upr font-size-23">GoGaming Admin<span class="opacity-80">v1.0</span></h3>
            <div id="login-form" class="content-box bg-default">
                <div class="content-box-wrapper pad20A">
                    <img class="mrg25B center-margin display-block" src="/build/images/logo.png" alt="">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-user"></i>
                            </span>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuário" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">Login</button>
                    </div>
                    <div class="row">
                        <!-- @captcha() -->
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<script type="text/javascript" src="{{ manifest('/build/js/nptunnel.js') }}"></script>
<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 700, "linear" );
        }, 300);
    });
</script>
</body>
</html>