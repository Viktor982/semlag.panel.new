@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>{{ $group->name }}</h2>
        <p>Grupo de Usuário do Painel</p>
    </div>
    <div class="panel">
        <div class="panel-body">
            <form method="POST" action="{{ route('groups.update', ['id' => $group->id]) }}">
                <h3 class="content-box-header bg-black">Pagamentos (Assinaturas, Cupons, Vendas, IPN, Saques) </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles->where('group', 1) as $role)
                        <tr>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <input type="hidden" id="role_{{ $role->id }}" name="role_{{ $role->id }}"
                                       value="{{ (in_array($role->role, $groupRoles)) ? 1 : 0 }}">
                                <button type="button" role="button"
                                        class="btn {{ (in_array($role->role, $groupRoles)) ? 'btn-danger' : 'btn-success' }}"
                                        id="role_{{ $role->id }}_btn" onclick="updateRole({{ $role->id }})">
                                    <i class="glyph-icon icon-minus" id="role_{{ $role->id }}_m"
                                       style="display: {{ (!in_array($role->role, $groupRoles)) ? 'none' : 'block' }};"></i>
                                    <i class="glyph-icon icon-plus" id="role_{{ $role->id }}_p"
                                       style="display: {{ (in_array($role->role, $groupRoles))  ? 'none' : 'block'}};"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h3 class="content-box-header bg-black">Clientes (Clientes, Afiliados e Revendedores) </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles->whereIn('group', [2,3,4]) as $role)
                        <tr>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <input type="hidden" id="role_{{ $role->id }}" name="role_{{ $role->id }}"
                                       value="{{ (in_array($role->role, $groupRoles)) ? 1 : 0 }}">
                                <button type="button" role="button"
                                        class="btn {{ (in_array($role->role, $groupRoles)) ? 'btn-danger' : 'btn-success' }}"
                                        id="role_{{ $role->id }}_btn" onclick="updateRole({{ $role->id }})">
                                    <i class="glyph-icon icon-minus" id="role_{{ $role->id }}_m"
                                       style="display: {{ (!in_array($role->role, $groupRoles)) ? 'none' : 'block' }};"></i>
                                    <i class="glyph-icon icon-plus" id="role_{{ $role->id }}_p"
                                       style="display: {{ (in_array($role->role, $groupRoles))  ? 'none' : 'block'}};"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h3 class="content-box-header bg-black">Opçoẽs do Site(Downloads, SlideShows, Games Suportados,
                    Depoimentos) </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
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
                                <input type="hidden" id="role_{{ $role->id }}" name="role_{{ $role->id }}"
                                       value="{{ (in_array($role->role, $groupRoles)) ? 1 : 0 }}">
                                <button type="button" role="button"
                                        class="btn {{ (in_array($role->role, $groupRoles)) ? 'btn-danger' : 'btn-success' }}"
                                        id="role_{{ $role->id }}_btn" onclick="updateRole({{ $role->id }})">
                                    <i class="glyph-icon icon-minus" id="role_{{ $role->id }}_m"
                                       style="display: {{ (!in_array($role->role, $groupRoles)) ? 'none' : 'block' }};"></i>
                                    <i class="glyph-icon icon-plus" id="role_{{ $role->id }}_p"
                                       style="display: {{ (in_array($role->role, $groupRoles))  ? 'none' : 'block'}};"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h3 class="content-box-header bg-black">Área Administrativa(Planos, Infra e Administração) </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
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
                                <input type="hidden" id="role_{{ $role->id }}" name="role_{{ $role->id }}"
                                       value="{{ (in_array($role->role, $groupRoles)) ? 1 : 0 }}">
                                <button type="button" role="button"
                                        class="btn {{ (in_array($role->role, $groupRoles)) ? 'btn-danger' : 'btn-success' }}"
                                        id="role_{{ $role->id }}_btn" onclick="updateRole({{ $role->id }})">
                                    <i class="glyph-icon icon-minus" id="role_{{ $role->id }}_m"
                                       style="display: {{ (!in_array($role->role, $groupRoles)) ? 'none' : 'block' }};"></i>
                                    <i class="glyph-icon icon-plus" id="role_{{ $role->id }}_p"
                                       style="display: {{ (in_array($role->role, $groupRoles))  ? 'none' : 'block'}};"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success pull-right" type="submit">Atualizar</button>
                <br class="clearfix">
        </div>
        </form>
    </div>
    </div>

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        function updateRole(roleId) {
            var input = document.getElementById('role_' + roleId);
            input.value = (input.value == 1) ? 0 : 1;

            var minus = document.getElementById('role_' + roleId + '_m');
            var plus = document.getElementById('role_' + roleId + '_p');
            var btn = document.getElementById('role_' + roleId + '_btn');

            var add = (input.value == 1) ? 'btn-danger' : 'btn-success';
            var del = (input.value == 1) ? 'btn-success' : 'btn-danger';
            minus.style.display = (input.value == 1) ? 'block' : 'none';
            plus.style.display = (input.value == 1) ? 'none' : 'block';
            btn.classList.add(add);
            btn.classList.remove(del);
        }
    </script>
@endsection
