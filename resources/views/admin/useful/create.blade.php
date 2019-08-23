@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Новая статья
            <small>Расскажите миру, что у вас нового</small>
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('useful.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Заголовок статьи</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Независимые СМИ потому и независимы, что чистый разум не скован границами" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input type="file" id="image" name="image" class="has-preview" data-preview="#image-preview" accept="image/*" required>
                            </div>
                            <div class="upload-preview">
                                <img id="image-preview" style="display:none" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Содержимое</label>
                                <textarea name="content" id="editor"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <a class="btn btn-default pull-right" href="{{ route('useful.index') }}">Назад</a>
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
