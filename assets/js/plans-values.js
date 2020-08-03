$(document).ready(function () {
    initDatatable();
    $("select[name=country_id]").select2();
});

$(document).on('click', '.btn-destroy', function () {
    let row = $(this).closest('tr');
    let url = $(this).closest('table').data('url-remove');

    $.get(url, (response) => {
        console.log(response);
    }, (error) => {
        console.log("erro");
    })

    removeRow(row);
});

function addRow() {
    let valueBrl = $("input[name=value_brl]");
    let valueUsd = $("input[name=value_usd]");
    let countryElement = $("select[name=country_id] option:selected");

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

    findRow(countryElement);
    destroy(countryElement);

    $("#datatable-responsive tbody").append(`
        <tr id="${countryElement.val()}1">
            <td>
                BRL
            </td>
            <td>${valueBrl.val()}</td>
            <td>${countryElement.text()}</td>
            <td>
                <button class="btn btn-black btn-destroy" type="submit">
                    <i class="glyph-icon icon-trash"></i>
                </button>
            </td>
        </tr>
    `);

    $("#datatable-responsive tbody").append(`
        <tr id="${countryElement.val()}2">
            <td>
                USD
            </td>
            <td>${valueUsd.val()}</td>
            <td>${countryElement.text()}</td>
            <td>
                <button onclick="removeRow($(this).closest('tr'))" class="btn btn-black btn-destroy" type="submit">
                    <i class="glyph-icon icon-trash"></i>
                </button>
            </td>
        </tr>
    `);

    initDatatable();

    $.toast({
        heading: 'Sucesso',
        text: 'Dado adicionado a tabela, lembre-se de salvar antes de sair.',
        position: 'top-right',
        icon: 'success',
        stack: false
    });

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

}

function destroy() {
    $("#datatable-responsive").dataTable().fnDestroy();
}

function initDatatable() {
    if($('#datatable-responsive').length > 0) {
        window._table = $('#datatable-responsive').DataTable({
            responsive: true
        });
    }
}