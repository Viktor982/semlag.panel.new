<div id="page-sidebar">
    <div id="header-logo" class="logo-bg">
        <a href="{{ route('home') }}" class="logo-content-big">
            &nbsp;
        </a>
        <a href="{{ route('home') }}" class="logo-content-small">
            &nbsp;
        </a>
        <a id="close-sidebar" href="#" title="Menu">
            <i class="glyph-icon icon-outdent"></i>
        </a>
    </div>
    <div class="scroll-sidebar">
        <ul id="sidebar-menu">
            @role('administrative')
            <li class="header"><span>Administração</span></li>
            <li>
                <a href="javascript:void(0);" title="Estatísticas">
                    <i class="glyph-icon icon-signal"></i>
                    <span>Estatísticas</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('stats.general') }}"><span>Gráficos</span></a></li>
                    </ul>

                </div>
            </li>


            <li>
                <a href="javascript:void(0);" title="Grupos">
                    <i class="glyph-icon icon-archive"></i>
                    <span>Grupos</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{ route('groups.all') }}" title="Responsive tabs"><span>Listar grupos</span></a>
                        </li>
                    </ul>

                </div>
            </li>

            <li>
                <a href="javascript:void(0);" title="Usuários">
                    <i class="glyph-icon icon-user"></i>
                    <span>Usuários</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{ route('users.all') }}" title="Listar usuários"><span>Listar usuários</span></a>
                        </li>
                        <li><a href="{{ route('users.create') }}" title="Criar usuário"><span>Criar usuário</span></a>
                        </li>
                    </ul>

                </div>
            </li>

            @endrole

            @role(['payments_sales_list', 'payments_subscriptions_list', 'payments_coupons_list'])
            <li class="header"><span>Vendas</span></li>
            @endrole
            @role('payments_coupons_list')
            <li>
                <a href="javascript:void(0);" title="Cupons">
                    <i class="glyph-icon icon-barcode"></i>
                    <span>Cupons</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('coupons.all') }}"><span>Listar Cupons</span></a></li>
                        <li><a href="{{ route('coupons.generate') }}"><span>Gerar cupom</span></a></li>
                    </ul>
                </div>
            </li>
            @endrole

            @role('testimonials_list')
            <li class="header"><span>Interações de Clientes</span></li>
            <li>
                <a href="javascript:void(0);" title="Depoimentos">
                    <i class="glyph-icon icon-star"></i>
                    <span>Depoimentos</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{ route('testimonials')}}"><span>Listar Todos os Depoimentos</span></a></li>
                        <li><a href="{{ route('testimonials.pending') }}"><span>Depoimentos Pendentes</span></a></li>
                        <li><a href="{{ route('testimonials.approved') }}"><span>Depoimentos Aprovados</span></a></li>
                        <li><a href="{{ route('testimonials.disapproved') }}"><span>Depoimentos Reprovados </span></a>
                        </li>
                    </ul>

                </div>
            </li>
            @endrole
            @role('testimonials_fake_list')
            <li>
                <a href="javascript:void(0);" title="Depoimentos Fakes">
                    <i class="glyph-icon icon-star"></i>
                    <span>Depoimentos Fakes</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{ route('testimonials.fakes-all')}}"><span>Listar Todos os Depoimentos</span></a>
                        </li>
                        @role('testimonials_fake_create')
                        <li>
                            <a href="{{ route('testimonials.fake-create') }}"><span>Criar Novo Depoimento Fake</span></a>
                        </li>
                        @endrole
                        @role('testimonials_fake_schedules')
                        <li>
                            <a href="{{ route('testimonials.fake-schedules') }}"><span>Depoimentos Programados</span></a>
                        </li>
                        @endrole
                    </ul>

                </div>
            </li>
            @endrole
            @role(['site_slides_list', 'site_games_list', 'site_download_links_list','site_faqs_list','site_languages_list', 'site_blog_posts_list', 'site_blog_comments_list'])
            <li class="header"><span>Site</span></li>
            <li>
                <a href="javascript:void(0);" title="Conteúdos">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Conteúdos</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        @role('site_games_list')
                        <li><a href="{{ route('games.all') }}"><span>Games</span></a></li>
                        @endrole
                    </ul>

                </div>
            </li>
            @endrole



        </ul>
    </div>
</div>