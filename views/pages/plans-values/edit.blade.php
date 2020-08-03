@extends('layout.default')
@section('content')

<div id="page-title">
    <h2>Editar Valores do Plano</h2>
</div>

<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>

        <div class="example-box-wrapper">

            <form id="planValue" class=" bordered-row" action="{{ route('plans-values.update', ['id' => $plan->id]) }}" method="post">


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="ontrol-label" for="value_brl">Preço em Reais (BRL)</label>
                            <input name="value_brl" placeholder="0.00" value="" type="text" class="form-control input-md">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="value_usd">Preço em Dólar (USD)</label>
                            <input name="value_usd" placeholder="0.00" value="" type="text" class="form-control input-md">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">País</label>
                            <select name="country_id" type="text" class="form-control input-md ms-container">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-black botao-sem-label btn-add" onClick="addPlanValue()" type="button"> <i class="glyph-icon icon-plus"></i> Adicionar</button>
                        </div>
                    </div>

                </div>

            </form>

            <div class="">
                <table id="datatable-responsive" class="table table-responsive" data-url-remove="{{ route('plans-values.destroy', ['id' => $plan->id]) }}">
                    <thead>
                        <tr>
                            <th>Moeda</th>
                            <th>Valor</th>
                            <th>País</th>
                            <th style="width: 15%">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plan->planValues as $value)
                        <tr id="{{ $value->country_id }}{{ $value->currency_id }}" data-country-id="{{ $value->country_id }}" data-currency-id="{{ $value->currency_id }}">
                            <td>
                                {{ $value->currency->code }}
                            </td>
                            <td>{{ $value->value }}</td>
                            <td>
                                {!!
                                $value->country
                                ? $value->country->short_name
                                : '<span class="">Não selecionado</span>'
                                !!}
                            </td>
                            <td>
                                <button class="btn btn-black btn-destroy" type="button">
                                    <i class="glyph-icon icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection


        @section('extra-scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                initDatatable();
                $("select[name=country_id]").select2();
            });

            $(document).on('click', '.btn-destroy', function() {
                let row = $(this).closest('tr');
                removeRow(row);
            });

            function addPlanValue() {

                $.toast({
                    heading: 'Info',
                    text: 'Inserindo....',
                    position: 'top-right',
                    icon: 'info',
                    stack: false
                })

                // button loading
                $('button.btn-add').addClass('disabled');
                $('button.btn-add').attr('disabled', 'disabled');


                let valueBrl = $("input[name=value_brl]");
                let valueUsd = $("input[name=value_usd]");
                let countryElement = $("select[name=country_id] option:selected");
                const url = $('form#planValue').attr('action')

                if (!validRow()) {
                    $.toast({
                        heading: 'Alerta',
                        text: 'Preencha todos os campos antes de continuar.',
                        position: 'top-right',
                        icon: 'error',
                        stack: false
                    });
                    return false;
                }


                // insert in api
                $.post(url, {
                    idCountry: countryElement.val(),
                    valueBrl: valueBrl.val(),
                    valueUsd: valueUsd.val()
                }).done(function(response) {

                    _response = JSON.parse(response);
                    // button loading
                    $('button.btn-add').removeClass('disabled');
                    $('button.btn-add').removeAttr('disabled');

                    if (!_response.status) {
                        $.toast({
                            heading: 'Alerta',
                            text: 'Erro ao cadastrar, tente novamente.',
                            position: 'top-right',
                            icon: 'error',
                            stack: false
                        });

                        return false;
                    }

                    $.toast({
                        heading: 'Sucesso',
                        text: 'Cadastrado com sucesso.',
                        position: 'top-right',
                        icon: 'success',
                        stack: false
                    });

                    findRow(countryElement);
                    destroy(countryElement);

                    addRow(countryElement.val(), countryElement.text(), valueBrl.val(), 1)
                    addRow(countryElement.val(), countryElement.text(), valueUsd.val(), 2)

                    initDatatable();

                    $.toast({
                        heading: 'Sucesso',
                        text: 'Dado adicionado a tabela, lembre-se de salvar antes de sair.',
                        position: 'top-right',
                        icon: 'success',
                        stack: false
                    });
                }, 'json')

            }

            function addRow(idCountry, textCountry, value, type = 1) {
                $("#datatable-responsive tbody").append(`
                    <tr id="${idCountry}${type}">
                        <td>
                            ${type == 1 ? 'BRL' : 'USD'}
                        </td>
                        <td>${parseFloat(value).toFixed(2)}</td>
                        <td>${textCountry}</td>
                        <td>
                            <button class="btn btn-black btn-destroy" type="submit">
                                <i class="glyph-icon icon-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            }

            function validRow() {
                let brl = $("input[name=value_brl]")
                let usd = $("input[name=value_usd]")
                let country = $("select[name=country_id] option:selected")
                let validated = true;

                if (!brl.val()) {
                    brl.addClass('error');
                    validated = false
                } else {
                    brl.removeClass('error');
                }

                if (!usd.val()) {
                    usd.addClass('error');
                    validated = false
                } else {
                    usd.removeClass('error');
                }

                if (!country.val()) {
                    country.addClass('error');
                    validated = false
                } else {
                    country.removeClass('error');
                }

                return validated;
            }

            function findRow(countryElement) {
                if ($(`tr#${countryElement.val()}1`).length > 0) {
                    removeRow($(`tr#${countryElement.val()}1`))
                }

                if ($(`tr#${countryElement.val()}2`).length > 0) {
                    removeRow($(`tr#${countryElement.val()}2`))
                }
            }

            function removeRow(row) {

                $.toast({
                    heading: 'Info',
                    text: 'Realizando remoção....',
                    position: 'top-right',
                    icon: 'info',
                    stack: false
                })

                // disable button
                row.find('button').addClass('disabled')
                row.find('button').attr('disabled', 'disabled');

                let url = row.closest('table').data('url-remove');
                let idCountry = row.data('country-id');
                let idCurrency = row.data('currency-id');

                const data = {
                    idCountry,
                    idCurrency
                }

                $.post(url, data, function(response) {

                    let _response = JSON.parse(response);
                    if (_response.status) {
                        row.remove();
                        window._table.row(row)
                            .remove()
                            .draw();

                        $.toast({
                            heading: 'Sucesso',
                            text: 'Linha removida com sucesso.',
                            position: 'top-right',
                            icon: 'success',
                            stack: false
                        });

                        return false;
                    }

                    row.find('button').removeClass('disabled')
                    row.find('button').removeAttr('disabled');
                    $.toast({
                        heading: 'Erro',
                        text: 'Erro ao remover linha, tente novamente.',
                        position: 'top-right',
                        icon: 'error',
                        stack: false
                    });
                });


            }

            function destroy() {
                $("#datatable-responsive").dataTable().fnDestroy();
            }

            function initDatatable() {
                if ($('#datatable-responsive').length > 0) {
                    window._table = $('#datatable-responsive').DataTable({
                        responsive: true
                    });
                }
            }
        </script>
        @endsection