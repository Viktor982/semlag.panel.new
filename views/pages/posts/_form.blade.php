<input type="hidden" name="language_id" value="{{ $language['id'] }}">
<div class="row">
    <div class="col-md-8">
        {{-- post panel --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <input id="title" name="title" type="text" value="{{ $post->title ?? null }}"
                                       class="form-control input-md" placeholder="Digite o título do post..."
                                       required="">
                            </div>
                            <div class="form-group">
                                <div class="input-group form-control">
                                    <label>Select image to upload:</label>
                                    <input type="file" id="blogimg" name="blogimg">
                                    <img style="margin: 10px 0;" id="imgpost" class="" src="{{ $post->blogimg ?? null }}" alt="your image" />
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="input-group">
                                    <strong>{{ env('APP_URL') }}/br/blog/</strong>
                                    <a href="#" id="slug"
                                       data-type="text"
                                       data-pk="1"
                                       data-placeholder="Selecione..."
                                       data-placement="right"
                                       data-title="Digite o slug do post"
                                       class="editable editable-click editable-open"
                                       data-original-title=""
                                       title="">{{ isset($post) ? $post->slug : 'slug-do-seu-post'}}</a>
                                    <input type="hidden" value="{{ isset($post) ? $post->slug : 'slug-do-seu-post'}}"
                                           name="slug" id="slug-hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="example-box-wrapper">
                                    <textarea class="ckeditor" cols="80" id="body" name="body"
                                              rows="10">{{ $post->body ?? null }}</textarea>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        {{-- end post panel --}}

        {{-- intro panel --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Introdução</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <div class="example-box-wrapper">
                                    <textarea class="ckeditor" cols="80" id="intro" name="intro"
                                              rows="10">{{ $post->intro ?? null }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        {{-- end intro panel --}}

        {{-- intro meta_description --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Meta Descrição</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <textarea cols="70" id="meta_description" name="meta_description" class="form-control"
                                          rows="10">{{ $post->meta_description ?? null}}</textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        {{-- end intro meta_description --}}
    </div>

    <div class="col-md-4">

        {{-- publish panel --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Publicação</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <p>Status: <a href="#" id="status"
                                              data-type="select"
                                              data-pk="1"
                                              data-value="{{ $post->status_id ?? null }}"
                                              data-title="Selecione o status da publicação"
                                              class="editable editable-click editable-unsaved"
                                              data-original-title=""
                                              data-placeholder="Selecione..."
                                              title="">{{ $post->status->name ?? null }}</a>
                                    <input type="hidden" name="status_id" id="status-hidden" value="1">
                                </p>
                                <p>Publicado em:
                                    <a href="#" id="publication_date"
                                       data-type="combodate"
                                       data-value="{{ isset($post) ? $post->publication_date : \Carbon\Carbon::now()->format('Y-m-d') }}"
                                       data-format="YYYY-MM-DD"
                                       data-viewformat="DD/MM/YYYY"
                                       data-template="DD/MM/YYYY"
                                       data-pk="1"
                                       data-title="Seleciona a data de publicação"
                                       class="editable editable-click"
                                       style="display: inline-block;">{{ isset($post) ? $post->publication_date->format('d/m/Y') : \Carbon\Carbon::now()->format('d/m/Y') }}</a>
                                    <input type="hidden" name="publication_date" id="publication_date-hidden"
                                           value="{{ isset($post) ? $post->publication_date : \Carbon\Carbon::now()->format('Y-m-d') }}">

                                </p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                @if(isset($post))
                                    <a href="javascript:removePostOrNot({{ $post->id }})" class="text-danger">
                                        Mover para a lixeira
                                    </a>
                                @endif
                            </div>
                            <div>
                                <button class="btn btn-primary pull-right" onclick="$('#post-form').submit();">
                                    @if(isset($post))
                                        Atualizar
                                    @else
                                        Criar
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end publish panel --}}

        {{-- categories panel --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Categorias</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                @foreach($categories as $category)
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      name="categories[]"
                                                      @if(isset($post) && ! is_null($post->categories))
                                                      @if($post->categories->contains('id', $category->id)) checked
                                                      @endif
                                                      @endif
                                                      value="{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        {{-- end categories panel --}}

        {{-- tags panel --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Tags</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                @foreach($tags as $tag)
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      name="tags[]"
                                                      @if(! is_null($post->tags))
                                                      @if($post->tags->contains('id', $tag->id)) checked @endif
                                                      @endif
                                                      value="{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        {{-- end tags panel --}}

    </div>
</div>
@section('extra-scripts')
    <script type="text/javascript">
        /* Datepicker bootstrap */

        $(function () {
            "use strict";
            $('.bootstrap-datepicker').bsdatepicker({
                format: 'yyyy-mm-dd'
            });

            // status field
            $('#status').editable({
                emptytext: 'Selecione...',
                source: [
                    @role('site_blog_posts_approved')
                    {value: 1, text: 'Publicado'},
                    @endrole,
                    {value: 2, text: 'Pendente de Revisão'},
                    {value: 3, text: 'Rascunho'}
                ]
            });
            $('#status').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'cancel') {
                    $('#status-hidden').val($('.editable-container select').val());
                }
            });

            // publication date field
            $('#publication_date').editable({
                format: 'yyyy-mm-dd',
                viewformat: 'dd/mm/yyyy',
                combodate: {
                    minYear: 2018,
                    maxYear: {{ date('Y') }}
                }

            });
            $('#publication_date').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'cancel') {
                    var day = $('.editable-container select.day').val();
                    var month = parseInt($('.editable-container select.month').val()) + 1;
                    var year = $('.editable-container select.year').val();
                    $('#publication_date-hidden').val(year + '-' + month + '-' + day);
                }
            });

            // slug field
            $('#slug').editable({
                type: 'text',
            });
            $('#slug').on('hidden', function (e, reason) {
                if (reason === 'save') {
                    var text = slugify($('.editable-container input[type="text"]').val());
                    setTimeout(function () {
                        $('#slug').editable('setValue', text);
                        $('#slug-hidden').val(text);
                    }, 300);
                }
            });

            // title callback
            $('#title').keyup(function () {
                var text = slugify($('#title').val());
                console.log('teste', $('#title').val());
                $('#slug').editable('setValue', text);
                $('#slug-hidden').val(text);
            });
        });

        function removePostOrNot(id) {
            $('#delete-post-modal').modal();
            $('#delete-post-modal .button-ok').click(function () {
                var url = '{!! route('blog.posts.all', ['lang' => $language['short']]) !!}';
                url += '/' + id + '/delete';
                window.location = url;

            });
        }

        ﻿
﻿

        function readURL(input) {

          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#imgpost').attr('src', e.target.result);
              $("#imgpost").removeClass("hidden");
            }

            reader.readAsDataURL(input.files[0]);
          }
        }




        $("#blogimg").change(function() {
            readURL(this);
        });

        

    </script>
    <script src="/build/widgets/ckeditor/ckeditor.js"></script>
    <script src="/build/widgets/tooltip/tooltip.js"></script>
    <script src="/build/widgets/popover/popover.js"></script>
    <link href="/build/widgets/xeditable/xeditable.css" rel="stylesheet" type="text/css"/>
    <script src="/build/widgets/xeditable/xeditable.js"></script>
    <script src="/build/widgets/xeditable/xeditable-demo.js"></script>
    <script src="/build/widgets/daterangepicker/moment.js"></script>

    <script>
        
        CKEDITOR.replaceAll( 'ckeditor', {
            filebrowserBrowseUrl: "{{ route('blog.images') }}",
            filebrowserImageBrowseUrl: "{{ route('blog.images') }}",
            filebrowserUploadUrl: "{{ route('blog.images.store_text') }}",
            filebrowserImageUploadUrl: "{{ route('blog.images.store_text') }}"
        } );
    </script>
@endsection