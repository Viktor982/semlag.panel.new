@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>{{ $user->username }}</h2>
        <p>Editar Usuário do Painel.</p>
    </div>
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero"></h3>
            <div class="content-box">
                <h3 class="content-box-header bg-black">Permissões de Grupo</h3>
                <div class="content-box-wrapper">
                    <form method="post" action="{{ route('users.update-roles',['id' => $user->id]) }}">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Grupo</th>
                                <th>Ação</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($groups as $group )
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td>
                                        <input type="hidden" name="group_{{ $group->id }}" id="group_{{ $group->id }}"
                                               value="{{ (in_array($group->id, $userGroups)) ? 1 : 0 }}">
                                        <button type="button" role="button" id="group_{{ $group->id }}_btn"
                                                class="btn {{ (in_array($group->id, $userGroups)) ? 'btn-danger' : 'btn-success' }}"
                                                onclick="updateGroup({{ $group->id }})">
                                            <i class="glyph-icon icon-minus" id="group_{{ $group->id }}_m"
                                               style="display: {{ (in_array($group->id, $userGroups)) ? 'block' : 'none' }};"></i>
                                            <i class="glyph-icon icon-plus" id="group_{{ $group->id }}_p"
                                               style="display: {{ (!in_array($group->id, $userGroups)) ? 'block' : 'none' }};"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>


            <div class="content-box">
                <h3 class="content-box-header bg-black">Pagamentos (Assinaturas, Cupons, Vendas, IPN, Saques) </h3>
                <div class="content-box-wrapper">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Permissão</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $roles->where('group', 1) as $role )
                            <tr>
                                <td>{{ $role->role }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <input type="hidden" value="{{ (in_array($role->role, $userRoles)) ? 1 : 0 }}"
                                           id="role_{{ $role->id }}" name="role_{{ $role->id }}">
                                    <button type="button" role="button" id="role_{{ $role->id }}_btn"
                                            class="btn {{ (in_array($role->role, $userRoles)) ? 'btn-danger' : 'btn-success' }}"
                                            onclick="updateRole({{ $role->id }})">
                                        <i class="glyph-icon icon-minus"
                                           id="role_{{ $role->id }}_m"
                                           style="display: {{ (in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                        <i class="glyph-icon icon-plus"
                                           id="role_{{ $role->id }}_p"
                                           style="display: {{ (!in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="content-box-wrapper">
                        <h3 class="content-box-header bg-black">Clientes (Clientes, Afiliados e Revendedores) </h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $roles->whereIn('group', [2,3,4]) as $role )
                                <tr>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <input type="hidden" value="{{ (in_array($role->role, $userRoles)) ? 1 : 0 }}"
                                               id="role_{{ $role->id }}" name="role_{{ $role->id }}">
                                        <button type="button" role="button" id="role_{{ $role->id }}_btn"
                                                class="btn {{ (in_array($role->role, $userRoles)) ? 'btn-danger' : 'btn-success' }}"
                                                onclick="updateRole({{ $role->id }})">
                                            <i class="glyph-icon icon-minus"
                                               id="role_{{ $role->id }}_m"
                                               style="display: {{ (in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                            <i class="glyph-icon icon-plus"
                                               id="role_{{ $role->id }}_p"
                                               style="display: {{ (!in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="content-box-wrapper">
                        <h3 class="content-box-header bg-black">Opçoẽs do Site(Downloads, SlideShows, Games Suportados,
                            Depoimentos) </h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $roles->whereIn('group', [5,6]) as $role )
                                <tr>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <input type="hidden" value="{{ (in_array($role->role, $userRoles)) ? 1 : 0 }}"
                                               id="role_{{ $role->id }}" name="role_{{ $role->id }}">
                                        <button type="button" role="button" id="role_{{ $role->id }}_btn"
                                                class="btn {{ (in_array($role->role, $userRoles)) ? 'btn-danger' : 'btn-success' }}"
                                                onclick="updateRole({{ $role->id }})">
                                            <i class="glyph-icon icon-minus"
                                               id="role_{{ $role->id }}_m"
                                               style="display: {{ (in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                            <i class="glyph-icon icon-plus"
                                               id="role_{{ $role->id }}_p"
                                               style="display: {{ (!in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="content-box-wrapper">
                        <h3 class="content-box-header bg-black">Área Administrativa(Planos, Infra e Administração) </h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $roles->whereIn('group', [7,8,9]) as $role )
                                <tr>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <input type="hidden" value="{{ (in_array($role->role, $userRoles)) ? 1 : 0 }}"
                                               id="role_{{ $role->id }}" name="role_{{ $role->id }}">
                                        <button type="button" role="button" id="role_{{ $role->id }}_btn"
                                                class="btn {{ (in_array($role->role, $userRoles)) ? 'btn-danger' : 'btn-success' }}"
                                                onclick="updateRole({{ $role->id }})">
                                            <i class="glyph-icon icon-minus"
                                               id="role_{{ $role->id }}_m"
                                               style="display: {{ (in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                            <i class="glyph-icon icon-plus"
                                               id="role_{{ $role->id }}_p"
                                               style="display: {{ (!in_array($role->role, $userRoles)) ? 'block' : 'none' }};"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success pull-right">Atualizar</button>
                    <br class="clearfix">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('extra-scripts')
    <script type="text/javascript">

        function updateResource(type, id) {
            var input = document.getElementById(type + '_' + id);
            var minus = document.getElementById(type + '_' + id + '_m');
            var plus = document.getElementById(type + '_' + id + '_p');
            var btn = document.getElementById(type + '_' + id + '_btn');
            input.value = (input.value == 1) ? 0 : 1;
            plus.style.display = (input.value == 1) ? 'none' : 'block';
            minus.style.display = (input.value == 0) ? 'none' : 'block';

            var add = (input.value == 1) ? 'btn-danger' : 'btn-success';
            var del = (input.value == 1) ? 'btn-success' : 'btn-danger';

            btn.classList.add(add);
            btn.classList.remove(del);
        }

        function updateRole(id) {
            return updateResource('role', id);
        }

        function updateGroup(id) {
            return updateResource('group', id);
        }
    </script>
@endsection
