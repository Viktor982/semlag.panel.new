@extends('layout.default')
@section('content')
    @if(is_null($customer))
        <!--Começo Mensagem de Erro --->
        <div class="alert alert-warning">
            <div class="bg-orange alert-icon">
                <i class="glyph-icon icon-warning"></i>
            </div>
            <div class="alert-content">
                <h3 class="alert-title">Aviso</h3>
                <p>
                    <b>O Cliente que você tentou acessar não existe.</b>
                    <a href="{{ route('customers.all') }}" title="Link">
                        Clique Aqui para Voltar.
                    </a>
                </p>
            </div>
        </div>
        <!--FIM Mensagem de Erro --->
    @else
        <div id="page-title">
            <h2>Editar Usuário - {{ $customer->nome }}</h2>
        </div>

        @if(Session::has('errors'))
            @foreach(\Session::get('errors') as $error)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <!--Começo Do Formulário --->
        <form method="post" action="{{ route('customers.update',['id' => $customer->id]) }}"
              class="form-horizontal bordered-row">
            <div class="panel">
                <div class="panel-body">
                    <div class="example-box-wrapper">

                        <div class="panel-title">
                            Informações do usuário:
                        </div>

                        <div class="form-group" id="">
                            <label class="col-sm-3 control-label">ID:</label>
                            <div class="col-sm-3">
                                <input type="text" id="" name=""
                                       value="{{ $customer->id }}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group" id="sub_id">
                            <label class="col-sm-3 control-label">Subscription ID:</label>
                            <div class="col-sm-3">
                                @if($sub_id != null)
                                <input type="text" id="" name=""
                                       value="{{ $sub_id }}" class="form-control" disabled>
                                @else
                                <input type="text" id="" name=""
                                       value="Sem subscription!" class="form-control" disabled>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome:</label>
                            <div class="col-sm-3">
                                <input type="text" name="nome" class="form-control" disabled id="nome"
                                       value="{{$customer->nome}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-3">
                                <input type="email" name="usuario" class="form-control" readonly id="email"
                                       value="{{$customer->usuario}}">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Senha:</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <input class="custom-checkbox" name="csenha" id="csenha" type="checkbox"
                                                   value="1">
                                            </span>
                                    <input type="text" name="senha" id="senha" class="form-control" disabled>
                                </div>
                                Marque essa opção caso queira alterar a senha do usuário.
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status do usuário:</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="status" name="status">
                                    @foreach([0 => 'Sem status', 1=>'Ativado', 2=>'Expirará em breve', 3=>'Expirado', 4=>'Desativado'] as $key=> $value)
                                        <option value="{{ $key }}"{{ ($key == $customer->status) ? ' selected' : null }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telefone:</label>
                            <div class="col-sm-3">
                                <input type="text" name="telefone" value="{{ $customer->telefone }}"
                                       class="form-control" id="telefone" placeholder="Digite o telefone...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Data do Cadastro:</label>
                            <div class="col-sm-3">
                                <div class="input-prepend input-group">
                                     <span class="add-on input-group-addon">
                                         <i class="glyph-icon icon-calendar"></i>
                                     </span>
                                    <input type="text" id="regdate" value="{{ brDate($customer->date_created) }}"
                                           name="regdate" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="last_login">
                            <label class="col-sm-3 control-label">Último IP:</label>
                            <div class="col-sm-3">
                                <input type="text" id="last_login" name="last_login"
                                       value="{{ $customer->last_login_ip_site }}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Último Login:</label>
                            <div class="col-sm-3">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                         <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                    <input type="text" id="last_login" name="last_login"
                                           value="{{ brDate($customer->last_login) }}" class="form-control"
                                           placeholder="Não detectado" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Idioma:</label>
                            <div class="col-sm-3">
                                <input type="text" id="lang" name="lang" class="form-control"
                                       value="{{ $customer->lang }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">PC UID:</label>
                            <div class="col-sm-3">
                                <input type="text" name="pc_uid" value="{{ $customer->pc_uid }}" class="form-control"
                                       id="pc_uid" disabled>
                                Chave unica de identificação de cada máquina.
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Referênciado por:</label>
                            <div class="col-sm-2">
                                <input type="text" id="afrefer" name="afrefer"
                                       value="{{ ($customer->affiliated_reference_id) ? $customer->affiliatedReference->nome.' - '.$customer->affiliatedReference->usuario : 'Sem referência' }}"
                                       class="form-control" disabled>
                            </div>
                            {!! ($customer->affiliated_reference_id) ? '<a class="btn btn-black" href='.route('customers.edit', ['id' => $customer->affiliated_reference_id ]).'><i class="glyph-icon icon-eye"></i> Ver Afiliado</a>':'' !!}
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Moeda:</label>
                            <div class="col-sm-2">
                                <select id="usrcurrency" name="usrcurrency" class="form-control">
                                    @if($customer_cur == 1)
                                    <option name="currency" value="1" selected>Real</option>
                                    <option name="currency" value="2">Dólar</option>
                                    @endif
                                    @if($customer_cur != 1)
                                    <option name="currency" value="1">Real</option>
                                    <option name="currency" value="2" selected>Dólar</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirmação:</label>
                            <div class="col-sm-6">
                                {!! (empty($customer->confirmacao)) ?
                                '<a class="btn btn-danger" href='.route('customers.confirm', ['id' => $customer->id, 'status' => '0' ]).'>Desconfirmar Usuário</a>'
                                 :'<a class="btn btn-success" href='.route('customers.confirm', ['id' => $customer->id, 'status' => '1' ]).'>Confirmar Usuário</a>
                                 <button id="reconfirm_email" class="btn btn-black" type="button">Reenviar Confirmação</button>' !!}
                            </div>
                        </div>

                        {!! (!empty($customer->confirmacao)) ? '<div class="form-group" >
                            <label class="col-sm-3 control-label">Código de Confirmação:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" readonly value="'.$customer->confirmacao.'" id="confirm">
                            </div>
                            </div>':''
                         !!}

                        <div id="result"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Revendedor:</label>
                            <div class="col-sm-6">
                                {!! ($customer->reseller) ? '<button class="btn btn-black" type="button" data-toggle="modal" data-target="#edit_plan">Editar Planos</button> <a class="btn btn-danger" href='.route('customers.update-reseller', ['id' => $customer->id, 'status' => '0' ]).'>Tirar Revenvedor</a>':'<a class="btn btn-success" href='.route('customers.update-reseller', ['id' => $customer->id, 'status' => '1' ]).'>Tornar Revendedor</a>' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-azure"><i class="glyph-icon icon-calendar"></i>
                                    Dias VIP Restantes: <span
                                            id="vip_time_value">{{ (\Carbon\Carbon::parse($customer->vip_time))->diffInDays() }}</span>
                                </button>
                                <button type="button" class="btn btn-azure"><i class="glyph-icon icon-calendar"></i>
                                    Dias VIP Premium
                                    Restantes: <span
                                            id="vip_time_premium_value">{{ (\Carbon\Carbon::parse($customer->vip_time_premium))->diffInDays() }}</span>
                                </button>
                            </div>
                        </div>

                        <div class="content-box remove-border dashboard-buttons clearfix form-group">

                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <a data-toggle="modal"
                                   data-target="#add_days"
                                   class="btn vertical-button remove-border btn-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-plus-square-o"></i>
                            </span>
                                    <span class="button-content">VIP</span>
                                </a>
                                <a data-toggle="modal"
                                   data-target="#customer_coupons"
                                   class="btn vertical-button remove-border btn-success" id="get-coupons" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-tags"></i>
                            </span>
                                    <span class="button-content">Ver Cupons</span>
                                </a>
                                <a data-toggle="modal"
                                   data-target="#edit_affiliate_config"
                                   class="btn vertical-button remove-border btn-azure" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-users"></i>
                            </span>
                                    <span class="button-content">Afiliado</span>
                                </a>
                                <a href="{{ route('customers.signIn', ['id' => $customer->id]) }}"
                                   class="btn vertical-button remove-border btn-warning" target="_blank" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-user"></i>
                            </span>
                                    <span class="button-content">Logar User</span>
                                </a>
                                <a href="{{ route('customers.send-email', ['id' => $customer->id], ['class' => 'btn btn-sm btn-azure']) }}"
                                   class="btn vertical-button remove-border btn-black" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                                    <span class="button-content">Enviar Email</span>
                                </a>

                                <a data-toggle="modal"
                                   data-target="#debugger_modal"
                                   id="debugger"
                                   class="btn vertical-button remove-border btn-black">
                                    <span class="glyph-icon icon-separator-vertical">
                                        <i class="glyph-icon icon-wifi"></i>
                                    </span>
                                    <span class="button-content">Debugger</span>
                                </a>

                                <a data-toggle="modal"
                                   data-target="#customer_npcoins" id="getnpcoins"
                                   class="btn vertical-button remove-border btn-black">
                                    <span class="glyph-icon icon-separator-vertical">
                                        <i class="glyph-icon icon-usd"></i>
                                    </span>
                                    <span class="button-content">NPcoins</span>
                                </a>

                                <a data-toggle="modal"
                                   data-target="#customer_subscriptions" id="getsubs"
                                   class="btn vertical-button remove-border btn-black">
                                    <span class="glyph-icon icon-separator-vertical">
                                        <i class="glyph-icon icon-usd"></i>
                                    </span>
                                    <span class="button-content">Assinaturas</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="example-box-wrapper">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ação Após Edição:</label>
                            <div class="col-sm-3">
                                <select class="form-control" onchange="searchInput(this)" id="action" name="action">
                                    <option value="edit">Editar Usuario</option>
                                    <option value="nothing">Continuar na Mesma Pagina</option>
                                </select>
                            </div>
                            <div class="col-sm-3" id="value" style="display: block;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Digite o Email"
                                           name="value_text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <div class="example-box-wrapper">
                                    <input type="submit" class="btn btn-black" value="Enviar">
                                    {!! aroute('Voltar', 'customers.all', [], ['class'=>'btn btn-warning']) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade bs-example-modal-lg" id="add_days" tabindex="-1" role="dialog"
             aria-labelledby="add_dayslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Adicionar Dias:</h4>
                    </div>
                    <div class="modal-body">
                        <div class="example-box-wrapper form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-azure"><i
                                                class="glyph-icon icon-calendar"></i>
                                        VIP Expira
                                        em: <span
                                                id="days_vip"> {{ (\Carbon\Carbon::parse($customer->vip_time))->diffInDays() }} </span>
                                        Dias
                                        {{ ($customer->vip_time = \Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                                        ?
                                         "":'-'.brDate($customer->vip_time) }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-azure"><i
                                                class="glyph-icon icon-calendar"></i>
                                        VIP Premium Expira
                                        em: <span
                                                id="days_vip_premium">{{ (\Carbon\Carbon::parse($customer->vip_time_premium))->diffInDays() }}</span>
                                        Dias{{ ($customer->vip_time_premium = \Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                                            ?
                                            "":'-'.brDate($customer->vip_time_premium) }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dias:</label>
                                <div class="col-sm-6">
                                    <input type="number" name="days" class="form-control spinner-input" id="days">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dias Premium:</label>
                                <div class="col-sm-6">
                                    <input type="number" name="days_premium" class="form-control spinner-input"
                                           id="days_premium">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Motivo:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="reason" class="form-control" id="reason">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div id="show-success" style="display: none">
                        <div class="alert alert-success">
                            <div class="bg-green alert-icon">
                                <i class="glyph-icon icon-check"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Atenção!</h4>
                                <p>A sua solicitação foi atendida com sucesso.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-error" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" id="save-days" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg" id="customer_coupons" tabindex="-1" role="dialog"
             aria-labelledby="customer_couponslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Cupons:</h4>
                    </div>

                    <div class="modal-body">
                        <div class="example-box-wrapper">
                            <div class="form-group">
                                <table id="datatable-responsive"
                                       class="table table-striped table-bordered responsive no-wrap display"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Origem</th>
                                        <th>Plano</th>
                                        <th>Código</th>
                                        <th>Data de Criação</th>
                                        <th>Situação</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Origem</th>
                                        <th>Plano</th>
                                        <th>Código</th>
                                        <th>Data de Criação</th>
                                        <th>Situação</th>
                                        <th>Status</th>
                                        <th>Ações</th>

                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="show-coupon-success" style="display: none">
                        <div class="alert alert-success">
                            <div class="bg-green alert-icon">
                                <i class="glyph-icon icon-check"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Atenção!</h4>
                                <p>A sua solicitação foi atendida com sucesso.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-coupon-error" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" id="save-days" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="edit_plan" tabindex="-1" role="dialog"
             aria-labelledby="edit_planlabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar Planos do Revendedor:</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal bordered-row"
                              action="{{ route('customers.update-reseller-plans', ['id' => $customer->id]) }}"
                              method="post">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Nº Minimo de Compras:</label>
                                <div class="col-md-4">
                                    <input id="name" name="min_vezes" type="text"
                                           value="{{ $customer->resellerSettings->min_vezes }}"
                                           class="form-control input-md" required="">
                                </div>
                            </div>
                            @foreach($plans as $plan)
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ $plan->nome }}:</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            <input id="{{$plan->id}}_1" name="{{$plan->id}}_pricepagseguro" type="text"
                                                   value="{{ (key_exists($plan->id,$resellerPlans)) ? $resellerPlans[$plan->id][0]['price_pagseguro'] : null  }}"
                                                   class="form-control input-md">
                                        </div>
                                        <span class="help-block">Valor em R$ no Pagseguro e MoIP</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input id="{{$plan->id}}_2" name="{{$plan->id}}_pricepaypal" type="text"
                                                   value="{{ (key_exists($plan->id,$resellerPlans)) ? $resellerPlans[$plan->id][0]['price_paypal'] : null }}"
                                                   class="form-control input-md">
                                        </div>
                                        <span class="help-block">Valor em $ no Paypal</span>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Começo Modal Afiliado --->
        <div class="modal fade bs-example-modal-lg" id="edit_affiliate_config" tabindex="-1" role="dialog"
             aria-labelledby="edit_affiliate_configlabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="form-horizontal bordered-row" id="affiliate-modal">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar Configurações do Afiliado:</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                @if($config == 1)
                                    <label class="col-md-4 control-label">Configuração Atual:</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="Configuração Padrão" class="form-control" readonly>
                                    </div>
                                @else
                                    <label class="col-md-4 control-label">Configuração Atual:</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="Configuração Customizada" class="form-control"
                                               readonly>
                                        <a href="{{ route('customers.reset-affiliate-rates', ['id' => $customer->id]) }}">
                                            <button class="btn btn-black" type="button">Resetar Configurações</button>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-md-4  control-label">Nível Atual:</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <select class="form-control" disabled>
                                            <option value="1" {{ ($customer->affiliated_ranking == 1) ? "selected":"" }}>
                                                Bronze
                                            </option>
                                            <option value="2" {{ ($customer->affiliated_ranking == 2) ? "selected":"" }}>
                                                Prata
                                            </option>
                                            <option value="3" {{ ($customer->affiliated_ranking == 3) ? "selected":"" }}>
                                                Ouro
                                            </option>
                                            <option value="4" {{ ($customer->affiliated_ranking == 4) ? "selected":"" }}>
                                                Platina
                                            </option>
                                            <option value="5" {{ ($customer->affiliated_ranking == 5) ? "selected":"" }}>
                                                Diamante
                                            </option>
                                        </select>
                                    </div>
                                    Marque essa opção caso queira personalizar fora do rank.
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4  control-label">Mudar de Nível:</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input class="custom-checkbox" name="rank_update"
                                                   onclick="changeStatus('affiliated_ranking', 1)"
                                                   id="affiliated_ranking"
                                                   type="checkbox"
                                                   value="1">
                                            </span>
                                        <select class="form-control" name="affiliated_ranking" onchange="addDays(this)"
                                                id="affiliated_ranking_1" disabled>
                                            <option value="" selected>
                                            </option>
                                            <option value="1">
                                                Bronze
                                            </option>
                                            <option value="2">
                                                Prata
                                            </option>
                                            <option value="3">
                                                Ouro
                                            </option>
                                            <option value="4">
                                                Platina
                                            </option>
                                            <option value="5">
                                                Diamante
                                            </option>
                                        </select>
                                    </div>
                                    Marque essa opção caso queira personalizar fora do rank.
                                </div>
                            </div>

                            <div class="form-group" id="aff-days" style="display: none">
                                <label class="col-md-4  control-label">Adicionar Dias do Afiliado?</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input name="days" id="affiliate_days" type="checkbox" value="1">
                                    </div>
                                    Marque Caso queira dar os 30 dias de aumento de nível para o Afiliado.
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4  control-label">% de comissão pela 1º venda:</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input class="custom-checkbox" name="ratecommission"
                                                   onclick="changeStatus('ratecommission', 1)" id="ratecommission"
                                                   type="checkbox"
                                                   value="1">
                                            </span>
                                        <input type="text" name="affiliated_percentage"
                                               value="{{ $customer->affiliated_percentage }}"
                                               id="ratecommission_1" class="form-control" disabled>
                                    </div>
                                    Marque essa opção caso queira personalizar fora do rank.
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">% de comissão pela 1º venda recorrente:</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                  <input class="custom-checkbox"
                                                         onclick="changeStatus('rate_subscription', 1)"
                                                         name="rate_subscription"
                                                         id="rate_subscription"
                                                         value="1"
                                                         type="checkbox"
                                                         @if($customer->is_receiving_subscription) checked @endif>
                                            </span>

                                        <input type="number" name="subscription_percentage"
                                               value="{{ $customer->subscription_percentage }}"
                                               id="rate_subscription_1" min="0" max="100" class="form-control"
                                               disabled>
                                    </div>
                                    Marque essa opção caso queira ativar o recebimento de comissão nas recorrências.
                                </div>
                            </div>
                            <hr>
                            <div class="row" align="center">
                                <div class="col-md-6">
                                    <div class="example-box-wrapper">
                                        <div class="form-horizontal bordered-row">
                                            <b>Indicações por Venda:</b>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 1:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_commission_bt_1', 1)"
                                                                    name="cmlvl_1_bt"
                                                                    id="affiliate_rate_commission_bt_1"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_commission_1"
                                                               value="{{ $customer->commission(1) ?: 0 }}"
                                                               id="affiliate_rate_commission_bt_1_1"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 2:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_commission_bt_2', 2)"
                                                                    name="cmlvl_2_bt"
                                                                    id="affiliate_rate_commission_bt_2"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_commission_2"
                                                               value="{{ $customer->commission(2) ?: 0 }}"
                                                               id="affiliate_rate_commission_bt_2_2"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Nível 3:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_commission_bt_3', 3)"
                                                                    name="cmlvl_3_bt"
                                                                    id="affiliate_rate_commission_bt_3"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_commission_3"
                                                               value="{{ $customer->commission(3) ?: 0 }}"
                                                               id="affiliate_rate_commission_bt_3_3"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Nível 4:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_commission_bt_4', 4)"
                                                                    name="cmlvl_4_bt"
                                                                    id="affiliate_rate_commission_bt_4"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_commission_4"
                                                               value="{{ $customer->commission(4) ?: 0 }}"
                                                               id="affiliate_rate_commission_bt_4_4"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="example-box-wrapper">
                                        <div class="form-horizontal bordered-row">
                                            <b>Indicações por venda (recorrente):</b>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 1:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_subscription_bt_1', 1)"
                                                                    name="sblvl_1_bt"
                                                                    id="affiliate_rate_subscription_bt_1"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_subscription_1"
                                                               value="{{ $customer->commission(1, true) ?: 0 }}"
                                                               id="affiliate_rate_subscription_bt_1_1"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 2:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_subscription_bt_2', 2)"
                                                                    name="sblvl_2_bt"
                                                                    id="affiliate_rate_subscription_bt_2"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_subscription_2"
                                                               value="{{ $customer->commission(2, true) ?: 0 }}"
                                                               id="affiliate_rate_subscription_bt_2_2"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 3:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_subscription_bt_3', 3)"
                                                                    name="sblvl_3_bt"
                                                                    id="affiliate_rate_subscription_bt_3"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_subscription_3"
                                                               value="{{ $customer->commission(3, true) ?: 0 }}"
                                                               id="affiliate_rate_subscription_bt_3_3"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5  control-label">Nível 4:</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                             <input class="custom-checkbox"
                                                                    onclick="changeStatus('affiliate_rate_subscription_bt_4', 4)"
                                                                    name="sblvl_4_bt"
                                                                    id="affiliate_rate_subscription_bt_4"
                                                                    type="checkbox"
                                                                    value="1">
                                                         </span>
                                                        <input type="text" name="affiliate_rate_subscription_4"
                                                               value="{{ $customer->commission(4, true) ?: 0 }}"
                                                               id="affiliate_rate_subscription_bt_4_4"
                                                               class="form-control" disabled>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="show-affiliate-success" style="display: none">
                            <div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon icon-check"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Atenção!</h4>
                                    <p>A sua solicitação foi atendida com sucesso.</p>
                                </div>
                            </div>
                        </div>

                        <div id="show-affiliate-error" style="display: none">
                            <div class="alert alert-danger">
                                <div class="bg-black alert-icon">
                                    <i class="glyph-icon icon-warning"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Erro</h4>
                                    <p id="error-type"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="save-aff-commission" class="btn btn-black">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Final Modal Afiliado --->

        <div class="modal fade bs-example-modal-lg" id="customer_npcoins" tabindex="-1" role="dialog"
             aria-labelledby="customer_npcoinslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">NP Coins:</h4>
                    </div>

                    <div class="modal-body">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Saldo em NPCoins:</label>
                                    <div class="col-sm-3">
                                        <div class="input-prepend input-group">
                                     <span class="add-on input-group-addon">
                                         <i class="glyph-icon icon-dollar"></i>
                                     </span>
                                            <input type="number" id="npcoins" name="npcoins"
                                                   value="{{$customer->npcoins}}"
                                                   class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">NPCoins Bloqueadas:</label>
                                    <div class="col-sm-3">
                                        <div class="input-prepend input-group">
                                     <span class="add-on input-group-addon">
                                         <i class="glyph-icon icon-dollar"></i>
                                     </span>
                                            <input type="number" id="npcoins_blocked"
                                                   value="{{$customer->blockedBalance()}}"
                                                   class="form-control" placeholder="0" disabled>
                                            <button class="btn btn-primary" id="btn-updateNpcoinsBlocked" onclick="updateNpcoinsBlocked()">
                                                Zerar NPCoins Blocked
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <table id="nptransactions-table"
                                       class="table table-striped table-bordered responsive no-wrap display"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Operação:</th>
                                        <th>Valor NP Coins:</th>
                                        <th>Criado em:</th>
                                        <th>Atualizado em:</th>
                                        <th>Situação:</th>
                                        <th>Situação:</th>

                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Operação:</th>
                                        <th>Valor NP Coins:</th>
                                        <th>Criado em:</th>
                                        <th>Atualizado em:</th>
                                        <th>Situação:</th>
                                        <th>Situação:</th>

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="show-npcoins-success" style="display: none">
                        <div class="alert alert-success">
                            <div class="bg-green alert-icon">
                                <i class="glyph-icon icon-check"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Atenção!</h4>
                                <p>A sua solicitação foi atendida com sucesso.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-npcoins-error" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type-npcoins"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" id="save-npcoins" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="customer_subscriptions" tabindex="-1" role="dialog"
             aria-labelledby="customer_subscriptionslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Histórico de Assinaturas:</h4>
                    </div>

                    <div class="modal-body">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal">
                                
                                <table id="npsubs-table"
                                       class="table table-striped table-bordered responsive no-wrap display"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Situação:</th>
                                        <th>Data de Criação:</th>
                                        <th>Última atualização:</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Situação:</th>
                                        <th>Data de Criação:</th>
                                        <th>Última atualização:</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($subscriptions as $sub)
                                        <tr>
                                            <td>{{$sub->id}}</td>
                                            <td>{{$sub->sub_status}}</td>
                                            <td>{{$sub->created_at}}</td>
                                            <td>{{$sub->updated_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="debugger_modal" tabindex="-1" role="dialog"
             aria-labelledby="debugger_modallabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Debugger:</h4>
                    </div>

                    <div class="modal-body" id="debugger-offline" style="display: none;">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status do Usuário:</label>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-danger"> OFFLINE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-body" id="debugger-online" style="display: none;">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status do Usuário:</label>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-success"> ONLINE</button>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <span class="alert alert-success">NOPING</span>
                                        <span class="alert alert-danger" id="debugger-ip"></span>
                                        <span class="alert alert-danger" id="debugger-location"></span>
                                        <span class="alert alert-danger" id="debugger-org"></span>
                                    </div>
                                </div>

                                <h4 class="modal-title">Conexões:</h4>
                                <table
                                       class="table table-striped table-bordered responsive no-wrap display"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Jogo</th>
                                        <th>Server:</th>
                                        <th>Regra:</th>
                                        <th>Processo:</th>
                                        <th>Protocolo:</th>
                                        <th>IP:</th>
                                        <th>Iniciou em:</th>
                                        <th>Tempo online:</th>
                                    </tr>
                                    </thead>
                                    <tbody id="debugger-table">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#reconfirm_email').click(function () {
                var user = {{$customer->id}};
                jQuery.ajax({
                    type: "POST",
                    url: '{{route('customers.reconfirm-email')}}',
                    data: {user: user},
                    success: function (status) {
                        var obj = JSON.parse(status);

                        if (obj.success === true) {
                            $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        } else if (obj.success === false) {
                            $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Não foi possivel atender sua solicitação.</b></p></div></div></div></div></div></div></div></div></div></div>')
                        }
                    },
                    error: function (status) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        //Select Action
        function searchInput(select) {
            if (select.value == "nothing") {
                document.getElementById('value').style.display = "none";
            } else {
                document.getElementById('value').style.display = "block";
            }
        }

        var request_update_days = false;

        $('#save-days').click(function () {
            var days = $('#days').val();
            var days_premium = $('#days_premium').val();
            var reason = $('#reason').val();


            var vip_time = $("#vip_time_value").text();
            var vip_time_premium = $("#vip_time_premium_value").text();
            $("#show-error").hide();
            $("#show-success").hide();

            var result_vip = Number(vip_time) + Number(days);
            var result_premium = Number(vip_time_premium) + Number(days_premium);

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type").text(res.data.alert);
                    $("#show-error").show()
                } else {
                    $("#show-success").show()
                    $("#vip_time_value").text(result_vip)
                    $("#vip_time_premium_value").text(result_premium)
                    $("#days_vip").text(result_vip)
                    $("#days_vip_premium").text(result_premium)
                    setTimeout(function () {
                        $("#add_days").modal('toggle');
                        $("#show-success").hide();
                        request_update_days = false;
                    }, 1500);
                }

            };

            var callbackFail = function (res) {
                $("#error-type").text(res.data.alert);
                $("#show-error").show()
            };

            if (!request_update_days) {
                request_update_days = true;
                axios.post("{{ route('customers.update-days') }}", {
                    days: days,
                    id: {{ $customer->id }},
                    days_premium: days_premium,
                    reason: reason
                }).then(callbackSuccess, callbackFail);
            }

        });

        function addDays(select) {
            if (select.value == 1) {
                document.getElementById('aff-days').style.display = "none";
            } else {
                document.getElementById('aff-days').style.display = "block";
            }
        }

        var request_update_affiliate = false;
        $('#save-aff-commission').click(function () {
            var commissions = {
                affiliate_rate_commission_1: $("#affiliate_rate_commission_bt_1").is(':checked') ?
                    $("#affiliate_rate_commission_bt_1_1").val() : null,
                affiliate_rate_commission_2: $("#affiliate_rate_commission_bt_2").is(':checked') ?
                    $("#affiliate_rate_commission_bt_2_2").val() : null,
                affiliate_rate_commission_3: $("#affiliate_rate_commission_bt_3").is(':checked') ?
                    $("#affiliate_rate_commission_bt_3_3").val() : null,
                affiliate_rate_commission_4: $("#affiliate_rate_commission_bt_4").is(':checked') ?
                    $("#affiliate_rate_commission_bt_4_4").val() : null
            }
            var subscriptions = {
                affiliate_rate_subscription_1: $("#affiliate_rate_subscription_bt_1").is(':checked') ?
                    $("#affiliate_rate_subscription_bt_1_1").val() : null,
                affiliate_rate_subscription_2: $("#affiliate_rate_subscription_bt_2").is(':checked') ?
                    $("#affiliate_rate_subscription_bt_2_2").val() : null,
                affiliate_rate_subscription_3: $("#affiliate_rate_subscription_bt_3").is(':checked') ?
                    $("#affiliate_rate_subscription_bt_3_3").val() : null,
                affiliate_rate_subscription_4: $("#affiliate_rate_subscription_bt_4").is(':checked') ?
                    $("#affiliate_rate_subscription_bt_4_4").val() : null
            }

            var defaultOptions = {
                affiliated_percentage: $("#ratecommission").is(':checked') ?
                    $("#ratecommission_1").val() : null,
                subscription_percentage: $("#rate_subscription").is(':checked') ?
                    $("#rate_subscription_1").val() : null,
                affiliated_ranking: $("#affiliated_ranking").is(':checked') ?
                    $('#affiliated_ranking_1').val() : null,
                addDays: $("#affiliate_days").is(':checked') ? $("#affiliate_days").val() : null,
            }

            Object.entries(commissions).forEach(o => (o[1] === null ? delete commissions[o[0]] : 0));
            Object.entries(subscriptions).forEach(o => (o[1] === null ? delete subscriptions[o[0]] : 0));
            Object.entries(defaultOptions).forEach(o => (o[1] === null ? delete defaultOptions[o[0]] : 0));

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type").text("Aconteceu algo de errado, Contate a Equipe de Developers");
                    $("#show-affiliate-error").show()
                } else {
                    $("#show-affiliate-success").show()
                    setTimeout(function () {
                        $("#aff-days").hide();
                        $("#edit_affiliate_config").modal('toggle');
                        $("#show-affiliate-success").hide();
                        if ($("#affiliate_days").is(':checked')) {
                            var vip_time = $("#vip_time_value").text();
                            var result_vip = Number(vip_time) + Number(30);
                            $("#days_vip").text(result_vip)
                            $("#vip_time_value").text(result_vip)
                        }

                        if ($("#affiliate_days").is(':checked')) {
                            $("#affiliate_days").prop("checked", false);
                        }
                        request_update_affiliate = false;
                    }, 1500);
                }
            };

            var callbackFail = function (res) {
                $("#error-type").text("Aconteceu algo de errado, Contate a Equipe de Developers");
                $("#show-affiliate-error").show();
                request_update_affiliate = false;

            };
            if (!request_update_affiliate) {
                request_update_affiliate = true
                axios.post('{{ route('customers.update-affiliate-rates', ['id' => $customer->id]) }}', {
                    commissions: commissions,
                    subscriptions: subscriptions,
                    defaultOptions: defaultOptions
                }).then(callbackSuccess, callbackFail);
            }

        });
    </script>

    <script type="text/javascript">

        var _RULES_ = {!! $rules !!};

        var _SERVERS_ = {!! $servers !!};

        var _CYCLE_ = null;

        function updateDebugger() {
            axios.get('{{ route('api.debugger.customer', ['id' => $id]) }}').then(function (res) {
                    var data = res.data;

                    document.querySelectorAll('.debugger-crow').forEach(function (r) {
                        r.remove();
                    });
                    document.getElementById('debugger-online').style.display = (data.online) ? 'block' : 'none';
                    document.getElementById('debugger-offline').style.display = (! data.online) ? 'block' : 'none';

                    if(data.online) {
                        document.getElementById('debugger-ip').innerHTML = 'IP: '+data.ip;
                        document.getElementById('debugger-location').innerHTML = (data.ipinfo.city) ? '('+data.ipinfo.country+') '+data.ipinfo.region+' '+data.ipinfo.city : '(unknown)';
                        document.getElementById('debugger-org').innerHTML = data.ipinfo.org;
                        data.connections.forEach(function (c) {
                            var _r = document.createElement('tr');
                            _r.classList.add('debugger-crow');
                            ['rulegroup','rule', 'rulegroup','process','protocol','address', 'created_at', 'duration']
                                .forEach(function (f) {
                                    var _t = document.createElement('td');
                                    _t.innerHTML = c[f];
                                    _r.appendChild(_t);
                                });
                            document.getElementById('debugger-table').appendChild(_r);
                        });
                    }
                },
                function (res) {

                });
        }

        document.getElementById('debugger')
            .addEventListener('click', function () {
                if(_CYCLE_ === null) {
                    updateDebugger();
                    _CYCLE_ = setInterval(updateDebugger, 5000);
                }
            });

        /* Datatables responsive */
        $('#get-coupons').click(function () {
            table = $('#datatable-responsive').DataTable({
                ajax: "{{ route('api.coupons.get-user', ['id' => $customer->id]) }}",
                columns: [
                    {data: "id"},
                    {data: "origin"},
                    {data: "plan"},
                    {data: "coupon"},
                    {data: "created_at"},
                    {data: "disabled"},
                    {data: "status"},
                    {
                        "data": null,
                        "defaultContent": "<button class='btn btn-danger'>Desabilitar</button>"
                    }
                ]
            });

            var callbackSuccess = function (res) {
                $("#show-coupon-success").show()
                setTimeout(function () {
                    $("#show-coupon-success").hide();
                }, 3000);
            };

            var callbackFail = function (res) {
                $("#error-type").text("Aconteceu algo de errado, Contate a Equipe de Developers");
                $("#show-coupon-error").show()
            };

            $('#datatable-responsive tbody').on('click', 'button', function () {
                var data = table.row($(this).parents('tr')).data();
                var id = data['id'];
                axios.post('{{  route('api.coupons.change') }}', {
                    id: id
                }).then(callbackSuccess, callbackFail);
            });
        });


        $("#customer_coupons").on('hidden.bs.modal', function () {
            table.destroy();
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });


    </script>

    <script type="text/javascript">
        var ids_blocked = [];
        $('#getnpcoins').click(function () {
            tablecoins = $('#nptransactions-table').DataTable({
                ajax: "{{ route('api.npcoins.transactions', ['id' => $customer->id]) }}",
                columns: [
                    {data: "id"},
                    {data: "operation"},
                    {data: "balance"},
                    {data: "created"},
                    {data: "updated"},
                    {data: "status"},
                    {
                        data: null
                    }
                ],
                columnDefs: [{
                    // puts a button in the last column
                    targets: [-1], render: function (data) {
                        console.log(data);
                        if (data.status == "Bloqueado" && data.operation == "Venda") {
                            if(data.balance > 0){
                                ids_blocked.push(data.id);
                            }
                            return "<button type='button' class='btn btn-danger'>Liberar Saldo</button>";
                        }
                        return "<span class='btn btn-black'>Saldo Liberado</span>";
                    }
                }],
            });

            tablecoins.on("click", "button",
                function () {
                    var id = tablecoins.rows($(this).closest("tr")).data()[0].id;
                    var blocked_npcoins = Number($('#npcoins_blocked').val()) - Number(tablecoins.rows($(this).closest("tr")).data()[0].balance) ;

                    var callbackSuccess = function (res) {
                        $("#show-npcoins-success").show();
                        setTimeout(function () {
                            $("#customer_npcoins").modal('toggle');
                            $("#show-npcoins-success").hide();
                            $('#npcoins').val(res.data.npcoins);
                            $('#npcoins_blocked').val(blocked_npcoins);
                            request_update_npcoins = false;
                        }, 3000);
                    };

                    var callbackFail = function (res) {
                        $("#error-type-npcoins").text("Aconteceu algo de errado, Contate a Equipe de Developers");
                        $("#show-npcoins-error").show();
                        request_update_npcoins = false;
                    };

                    if (!request_update_npcoins) {
                        request_update_npcoins = true
                        axios.post('{{ route('api.npcoins.release-balance') }}', {
                            id: id
                        }).then(callbackSuccess, callbackFail);
                    }
                });
        });

        var request_update_npcoins = false;
        $('#save-npcoins').click(function () {
            var npcoins = $('#npcoins').val();
            var callbackSuccess = function (res) {
                $("#show-npcoins-success").show()
                setTimeout(function () {
                    $("#customer_npcoins").modal('toggle');
                    $("#show-npcoins-success").hide();
                    request_update_npcoins = false;
                }, 3000);
            };

            var callbackFail = function (res) {
                $("#error-type-npcoins").text("Aconteceu algo de errado, Contate a Equipe de Developers");
                $("#show-npcoins-error").show();
                request_update_npcoins = false;
            };

            if (!request_update_npcoins) {
                request_update_npcoins = true
                axios.post('{{ route('customers.update-npcoins', ['id' => $customer->id]) }}', {
                    npcoins: npcoins
                }).then(callbackSuccess, callbackFail);
            }
        });


        $("#customer_npcoins").on('hidden.bs.modal', function () {
            tablecoins.destroy();
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });


    </script>

    <script type="text/javascript">
        $(function () {
// password field
            var cSenha = function () {
                if ($("#csenha").is(':checked')) {
                    $("#senha").prop("disabled", false);
                } else {
                    $("#senha").val("");
                    $("#senha").prop("disabled", true);
                }
            };
            $("#csenha").change(cSenha);
            cSenha();

// subscription percentage field
            var subscriptionPercentage = function (event) {
                if ($("#is_receiving_subscription").is(':checked')) {
                    $("#subscription_percentage").prop("disabled", false);
                } else {
                    $("#subscription_percentage").val("");
                    $("#subscription_percentage").prop("disabled", true);
                }
            };
            $("#is_receiving_subscription").change(subscriptionPercentage);
            subscriptionPercentage();
        });

        function changeStatus(field, value) {
            $("#" + field).change(function () {
                if ($("#" + field).is(':checked')) {
                    $("#" + field + '_' + value).prop("disabled", false);
                } else {
                    $("#" + field + '_' + value).val("")
                    $("#" + field + '_' + value).prop("disabled", true);
                }
            });
        }
    </script>

    <script>

        function updateNpcoinsBlocked()
        {
            setTimeout(function() {
                $('#loading').fadeIn( 700, "linear" );
            }, 300);

            axios.post("{{ route('api.npcoins.release-balance-all') }}", {
                ids: ids_blocked
            }).then(function (response) {
                alert('Ok. Atualize a pagina!');
            }).catch(function (error){
                alert('Um erro ocorreu, contacte o administrador: ' + error);
            }).finally(function(){
                setTimeout(function() {
                    $('#loading').fadeOut( 700, "linear" );
                }, 300);
            });
        }
    </script>
@endsection
