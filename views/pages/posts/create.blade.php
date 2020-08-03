@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Criando novo post</h2>
    </div>
    <form class="form-horizontal bordered-row" method="post" enctype="multipart/form-data" id="post-form"
          action="{{ route('blog.posts.store', ['lang'=>$language['short']]) }}">
        @include('pages.posts._form')
    </form>
@endsection