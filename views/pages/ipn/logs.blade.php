@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Logs de IPN</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">
                <select id="gateway">
                    <option value="">Ver Tudo</option>
                    <option value="mercadopago">Mercadopago</option>
                    <option value="paypal">Paypal</option>
                    <option value="pagseguro">Pagseguro</option>
                    <option value="pagarme">PagarMe</option>
                    <option value="stripe">Stripe</option>
                </select>
                <button onclick="getCurrentLog()">Atualizar manualmente.</button>
                <br>
                <textarea id="log" style="width:100%;" rows="10"></textarea>
                <input type="checkbox" id="reload" checked>Continuar re-carregando logs.
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var getCurrentLog = function () {
            var gateway = document.getElementById("gateway").value;
            var baseUrl = '{{ route('ipn.check-gateway') }}';
            var url = (gateway === '') ? baseUrl : baseUrl + '/' + gateway;
            axios.get(url)
                .then(function (response) {
                    var textarea = document.getElementById("log");
                    textarea.innerHTML = response.data;
                });
        };
        getCurrentLog();
        setInterval(function () {
            var reload = document.getElementById("reload");
            if (reload.checked) {
                getCurrentLog();
            }
        }, 60000);
    </script>
@endsection


