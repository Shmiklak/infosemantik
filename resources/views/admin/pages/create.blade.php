@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Новая страница
            <small>Не забудьте добавить ссылку на страницу в меню, или еще куда-нибудь</small>
        </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Заполните форму</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('pages.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Заголовок страницы</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Независимые СМИ потому и независимы, что чистый разум не скован границами" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="editor">Содержимое страницы</label>
                                <textarea name="content" id="editor"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('ckfinder::setup')
@push('scripts')
    <script src="/js/admin/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace( 'editor' );
        CKFinder.setupCKEditor( editor );
    </script>
@endpush
