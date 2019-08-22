@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Изменение продукта {{ $product->title }}
            <small>Здесь вы можете изменить продукт</small>
        </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                        <h3 class="box-title">Заполните форму</h3>
                    </div>

                    <form role="form" method="POST" enctype="multipart/form-data"
                          action="{{route('products.update', $product->id)}}">
                        <div class="box-body">
                            @csrf
                            {{ method_field("PUT") }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Заголовок</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                   placeholder="Моноблок Fujitsu K557/24" value="{{ $product->title }}"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ссылка на продукт</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                   value="{{ $product->slug }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Уникальный ключ</label>
                                            <input type="text" class="form-control" id="custom_id" name="custom_id"
                                                   value="{{ $product->custom_id }}"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Главное изображение</label>
                                            <input type="file" id="image" name="main_image" class="has-preview"
                                                   data-preview="#image-preview" accept="image/*">

                                            <p class="help-block">Главное изображение продукта. Оно будет показываться
                                                на
                                                страницах каталога, а также будет самым первым в списке изображений
                                                продукта.</p>
                                        </div>
                                        <div class="upload-preview">
                                            <img id="image-preview" src="/{{ $product->main_image }}"/>
                                        </div>
                                        <div class="form-group">
                                            <p class="help-block">Вы можете добавить до пяти других изображений этого
                                                продукта.</p>
                                            <label>Изображения продукта</label>
                                            <input type="file" id="image_1" name="image_1" class="has-preview"
                                                   data-preview="#image-preview1" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview1" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_1 }}"/>
                                            </div>
                                            <input type="file" id="image_2" name="image_2" class="has-preview"
                                                   data-preview="#image-preview2" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview2" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_2 }}"/>
                                            </div>
                                            <input type="file" id="image_3" name="image_3" class="has-preview"
                                                   data-preview="#image-preview3" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview3" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_3 }}"/>
                                            </div>
                                            <input type="file" id="image_4" name="image_4" class="has-preview"
                                                   data-preview="#image-preview4" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview4" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_4 }}"/>
                                            </div>
                                            <input type="file" id="image_5" name="image_5" class="has-preview"
                                                   data-preview="#image-preview5" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview5" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_5 }}"/>
                                            </div>
                                            <input type="file" id="image_6" name="image_6" class="has-preview"
                                                   data-preview="#image-preview6" accept="image/*"
                                                   style="margin-bottom: 1em">
                                            <div class="upload-preview">
                                                <img id="image-preview6" style="margin-bottom: 1em;"
                                                     src="/{{ $product->image_6 }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="short_description">Краткое описание</label>
                                            <textarea name="short_description" id="short_description">{!! $product->short_description !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Главное описание</label>
                                            <textarea name="description"
                                                      id="description">{!! $product->description !!}</textarea>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_available"
                                                       @if($product->is_available == 1) checked @endif> В наличии
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_recommended"
                                                       @if($product->is_recommended == 1) checked @endif>
                                                Рекомендованный продукт
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_bestseller"
                                                       @if($product->is_bestseller == 1) checked @endif> Бестселлер
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Категория</label>
                                            <select class="form-control select2" style="width: 100%;" id="category"
                                                    name="category_id">
                                                <option disabled>Выберите категорию</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if($category->id == $product->category_id) selected @endif>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h4>Атрибуты</h4>
                                        <div class="attributes-box">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('ckfinder::setup')
@push('scripts')
    <script src="/js/admin/select2.full.min.js"></script>
    <script src="/js/admin/ckeditor.js"></script>
    <script src="/js/admin/adapters/jquery.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let editor = CKEDITOR.replace('description');
        CKFinder.setupCKEditor(editor);

        let shorteditor = CKEDITOR.replace('short_description');
        CKFinder.setupCKEditor(shorteditor);

        $('.select2').select2();
        loadAttributes(loadAttributesValues);

        function loadAttributes(callback) {
            $.ajax({
                type: 'GET',
                url: '/admin/products/get-attributes',
                data: {
                    id: $("#category").val(),
                },
                success: function (data) {
                    let html = '';
                    for (let i in data) {
                        if (data[i].has_ckeditor == 1) {
                            html += '<div class="form-group">' +
                                '<label for="title">' + data[i].title + '</label>' +
                                '<textarea class="ckeditor" id="attribute-' + data[i].id + '" name="attribute-' + data[i].id + '"></textarea>' +
                                '</div>'
                        } else {
                            html += '<div class="form-group">' +
                                '<label for="title">' + data[i].title + '</label>' +
                                '<input type="text" class="form-control" id="attribute-' + data[i].id + '" name="attribute-' + data[i].id + '">' +
                                '</div>'
                        }
                    }
                    $('.attributes-box').html(html);
                    $('.attributes-box .ckeditor').each(function () {
                        let element = $(this).attr('id');
                        CKEDITOR.replace(element, {
                            customConfig: '/js/admin/attributes.js?v=1.2'
                        });
                    });
                    callback();
                },
                error: function () {
                    swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                }
            });
        }

        function loadAttributesValues() {
            $.ajax({
                type: 'GET',
                url: '/admin/products/load-attributes',
                data: {
                    id: $("#product_id").val(),
                },
                success: function (data) {
                    console.log(data);
                    for (let i in data) {
                        let $input = $("#" + data[i].field),
                            value = data[i].value;
                        if ($input.is('textarea')) {
                            CKEDITOR.instances[data[i].field].setData(value);
                        } else {
                            $input.val(value);
                        }
                    }
                },
                error: function () {
                    swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                }
            });
        }

        $('#category').on('select2:select', function (e) {
            loadAttributes();
        });
    </script>
    @if ($errors->any())
        <script>
            swal('Что-то пошло не так', '@foreach ($errors->all() as $error) {{ $error }}\n @endforeach', "error");
        </script>
    @endif
@endpush
@push('styles')
    <link rel="stylesheet" href="/js/admin/select2.min.css">
@endpush
