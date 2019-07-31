@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Добавление баннера
            <small>Здесь вы можете добавить баннер для главной страницы вашего сайта</small>
        </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Заполните форму</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('banners.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Заголовок</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Профессиональная техника для дома" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="Значимость этих проблем настолько очевидна, что" value="{{ old('description') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input type="file" id="image" name="image" class="has-preview" data-preview="#image-preview" accept="image/*" required>

                                <p class="help-block">Изображение для полной версии сайта.</p>
                            </div>
                            <div class="upload-preview">
                                <img id="image-preview" style="display:none" />
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение мобильной версии</label>
                                <input type="file" id="image_mobile" name="image_mobile" class="has-preview" data-preview="#image_mobile-preview" accept="image/*" required>

                                <p class="help-block">Изображение для мобильной версии сайта.</p>
                            </div>
                            <div class="upload-preview">
                                <img id="image_mobile-preview" style="display:none" />
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
