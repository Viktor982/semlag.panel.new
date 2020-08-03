@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Regras JSON</h2>
        <h4>Lista de regras para criar</h4>
    </div>
    <div class="panel">

        <div class="panel-body">
            @if(isset($error))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    {{ $error }}
                </div>
            @endif

            <section class="content">
                <div class="row">
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-facebook">
                                    <a href="{{ route('rules.show.process') }}" title="Mostra ProcessList">
                                        <i class="glyph-icon font-size-28 font-white">Process List</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-facebook">
                                    <a href="{{ route('rules.show.rulegroup') }}">
                                        <i class="glyph-icon font-size-28 font-white">RuleGroup List</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-facebook">
                                    <a href="{{ route('rules.show.rulegroup-fake') }}">
                                        <i class="glyph-icon font-size-28 font-white">Fake List</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-facebook">
                                    <a href="{{ route('bridge.final.home') }}">
                                        <i class="glyph-icon font-size-28 font-white">Alias List</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-facebook">
                                    <a href="{{ route('rules.show.filter') }}">
                                        <i class="glyph-icon font-size-28 font-white">Filters List</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">


    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });


    </script>
@endsection