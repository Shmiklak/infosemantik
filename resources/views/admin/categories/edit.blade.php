@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Изменение категории
            <small>Здесь вы можете изменить категорию <b>{{ $category->title }}</b></small>
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
                    <form role="form" method="POST" enctype="multipart/form-data"
                          action="{{route('categories.update', $category->id)}}">
                        @csrf
                        @method("PUT")
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название для категории</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Ноутбуки" value="{{ $category->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение категории</label>
                                <input type="file" id="image" name="image" class="has-preview"
                                       data-preview="#image-preview" accept="image/*">
                                <input type="hidden" name="old_image" value="{{ $category->image }}">

                                <p class="help-block">Это изображение будет показываться только в блоке "Популярные
                                    категории", если это не требуется оставьте поле пустым.</p>
                            </div>
                            <div class="upload-preview">
                                @if($category->image == null)
                                    <img id="image-preview" style="display:none;"/>
                                @else
                                    <img id="image-preview" style="display:inline-block;"
                                         src="/{{ $category->image }}"/>
                                @endif

                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_popular" @if($category->is_popular == 1) checked @endif> Показывать в блоке "Популярные категории"
                                </label>
                            </div>
                            <div class="form-group" method="POST" enctype="multipart/form-data">
                                <label for="exampleInputEmail1">Родительская категория</label>
                                <select class="form-control" name="parent_id">
                                    <option value="-1" @if($category->parent_id == null) selected @endif>Не требуется</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" @if($category->parent_id == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="order" value="{{ $category->order }}">
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
