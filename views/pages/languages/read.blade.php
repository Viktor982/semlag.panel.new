@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Linguagens</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="example-box-wrapper">
                    <div class="wmd-panel">
                        <pre><code class="PHP">{!! htmlspecialchars(base64_decode($file)) !!}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script>hljs.initHighlightingOnLoad();</script>
@endsection