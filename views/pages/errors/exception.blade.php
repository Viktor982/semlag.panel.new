<h1>{{ $exception->getMessage() }}</h1>
<h6>{{ $exception->getFile() }} ({{ $exception->getLine() }})</h6>
<pre>
    {{ $exception->getTraceAsString() }}
</pre>