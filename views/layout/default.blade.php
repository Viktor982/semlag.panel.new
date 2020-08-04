&nbsp;
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>
    <link href="{{ manifest('/build/css/nptunnel.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/timelify.css">
    @yield('extra-styles')
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>GoGaming Administrativo</title>
    <META NAME="robots" CONTENT="noindex,nofollow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/build/images/favicon.ico">
</head>
<body>
<div id="sb-site">

    <div id="loading">
        <div class="svg-icon-loader">
            <img src="/build/images/svg-loaders/pacman.svg" width="120" alt="">
        </div>
    </div>

    <div id="page-wrapper">
        <div id="mobile-navigation">
            <button id="nav-toggle" class="collapsed btn-menu-mobile" data-toggle="collapse" data-target="#page-sidebar">
                <span class="glyph-icon icon-tasks"></span>
            </button>
        </div>
        <!-- SIDEBAR -->
    @include('components._navigationmenu')
    <!-- /SIDEBAR -->
        <div id="page-content-wrapper">
            <div id="page-content">
                <div id="page-header">
                    <div id="header-nav-left">
                        <a class="header-btn" id="logout-btn" href="{{ route('auth.logout') }}" title="deslogar">
                            <i class="glyph-icon icon-linecons-lock"></i>
                        </a>
                        <!-- USER -->
                    @include('components._usermenu')
                    <!-- /USER -->
                    </div><!-- #header-nav-left -->

                    <!-- TOPNAV -->
                {{-- @include('components._topmenu') --}}
                <!-- /TOPNAV-->

                </div>
                <!-- CONTENT-->
            @yield('content')
            <!-- /CONTENT-->
            </div>
        </div>
    </div>
</div>
<script src="{{ manifest('/build/js/nptunnel.js') }}"></script>
<script src="{{ manifest('/build/js/jquery.timelify.js') }}"></script>
@yield('extra-scripts')
<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 700, "linear" );
        }, 300);
    });
</script>
</body>
</html>