<div class="user-account-btn dropdown">
    <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
        <img width="28" src="/build/images/user.png">
        <span>{{ $authenticated->username }}</span>
        <i class="glyph-icon icon-angle-down"></i>
    </a>
    <div class="dropdown-menu float-right">
        <div class="box-sm">

            <div class="divider"></div>
            <ul class="reset-ul mrg5B">
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--A future example to use..--}}
                {{--<i class="glyph-icon float-right icon-caret-right"></i>--}}
                {{--</a>--}}
                {{--</li>--}}
            </ul>
            <div class="button-pane button-pane-alt pad5L pad5R text-center">
                <a href="{{ route('auth.logout') }}" class="btn btn-flat display-block font-normal btn-danger">
                    <i class="glyph-icon icon-power-off"></i>
                    Deslogar
                </a>
            </div>
        </div>
    </div>
</div>