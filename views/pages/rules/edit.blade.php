@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Regras JSON</h2>
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
                    <form action="{{ route('rules.rule.update') }}" method="post" class="form">
                        <input type="hidden" name="version" value="{{ $version }}">
                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-default" target="_blank" href="{{  "/download/rules/process_list_$version.json" }}">Veja Raw</a>
                            </div>
                            <label for="jjson_p">Json Process List Rules</label>
                            <textarea class="form-control wysiwyg-editor" name="rule_process_json" id="jjson_p" cols="15" rows="30">{{ $process_json }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-default" target="_blank" href="{{  "/download/rules/alias_$version.json" }}">Veja Raw</a>
                            </div>
                            <label for="jjson_a">Json Alias Rules</label>
                            <textarea class="form-control wysiwyg-editor" name="rule_alias_json" id="jjson_a" cols="15" rows="30">{{ $alias_json }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-default" target="_blank" href="{{  "/download/rules/filters_$version.json" }}">Veja Raw</a>
                            </div>
                            <label for="jjson_f">Json Filters Rules</label>
                            <textarea class="form-control wysiwyg-editor" name="rule_filters_json" id="jjson_f" cols="15" rows="30">{{ $filters_json }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default">Salvar</button>
                        </div>
                    </form>
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
                paging: false
            });
        });


    </script>
@endsection