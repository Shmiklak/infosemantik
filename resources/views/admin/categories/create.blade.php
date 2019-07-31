@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Добавление категории
            <small>Здесь вы можете добавить категорию для вашего сайта</small>
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название для категории</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Ноутбуки" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение категории</label>
                                <input type="file" id="image" name="image" class="has-preview" data-preview="#image-preview" accept="image/*">

                                <p class="help-block">Это изображение будет показываться только в блоке "Популярные категории", если это не требуется оставьте поле пустым.</p>
                            </div>
                            <div class="upload-preview">
                                <img id="image-preview" style="display:none" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_popular"> Показывать в блоке "Популярные категории"
                                </label>
                            </div>
                            <div class="form-group" method="POST" enctype="multipart/form-data">
                                <label for="exampleInputEmail1">Родительская категория</label>
                                <select class="form-control" name="parent_id">
                                    <option selected value="-1">Не требуется</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="order" value="{{ count($categories) + 1 }}">
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
