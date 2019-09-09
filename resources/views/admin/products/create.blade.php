@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Добавление продукта
            <small>Здесь вы можете добавить продукт</small>
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
                        @csrf

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Моноблок Fujitsu K557/24" value="{{ old('title') }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Уникальный ключ</label>
                                        <input type="text" class="form-control" id="custom_id" name="custom_id" value="{{ old('custom_id') }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Главное изображение</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image" name="main_image" class="has-preview"
                                                       data-preview="#image-preview" accept="image/*" required>
                                                <p class="help-block">Главное изображение продукта. Оно будет
                                                    показываться на
                                                    страницах каталога, а также будет самым первым в списке изображений
                                                    продукта.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upload-preview">
                                        <img id="image-preview" style="display:none"/>
                                    </div>
                                    <div class="form-group">
                                        <p class="help-block">Вы можете добавить до шести других изображений этого
                                            продукта.</p>
                                        <label style="margin-bottom: 1em">Изображения продукта</label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_1" name="image_1" class="has-preview"
                                                       data-preview="#image-preview1" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_1" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>

                                        <div class="upload-preview">
                                            <img id="image-preview1" style="display:none; margin-bottom: 1em;"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_2" name="image_2" class="has-preview"
                                                       data-preview="#image-preview2" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_2" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>

                                        <div class="upload-preview">
                                            <img id="image-preview2" style="display:none; margin-bottom: 1em;"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_3" name="image_3"
                                                       class="has-preview"
                                                       data-preview="#image-preview3" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_3" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>

                                        <div class="upload-preview">
                                            <img id="image-preview3" style="display:none; margin-bottom: 1em;"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_4" name="image_4" class="has-preview"
                                                       data-preview="#image-preview4" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_4" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>

                                        <div class="upload-preview">
                                            <img id="image-preview4" style="display:none; margin-bottom: 1em;"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_5" name="image_5" class="has-preview"
                                                       data-preview="#image-preview5" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_5" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>
                                        <div class="upload-preview">
                                            <img id="image-preview5" style="display:none; margin-bottom: 1em;"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" id="image_6" name="image_6" class="has-preview"
                                                       data-preview="#image-preview6" accept="image/*"
                                                       style="margin-bottom: 1em">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" data-file="#image_6" data-toggle="modal"
                                                        data-target="#images-modal"
                                                        class="btn btn-primary btn-sm select-from-server">
                                                    Выбрать с сервера
                                                </button>
                                            </div>
                                        </div>
                                        <div class="upload-preview">
                                            <img id="image-preview6" style="display:none; margin-bottom: 1em;"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Краткое описание</label>
                                        <textarea name="short_description" id="short_description">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampldescriptioneInputEmail1">Главное описание</label>
                                        <textarea name="description" id="description">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Описание в каталоге</label>
                                        <textarea name="catalog_description"
                                                  id="catalog_description">{{ old('catalog_description') }}</textarea>
                                    </div>
                                    <div class="checkbox">
                                        <label>

                                            <input type="checkbox" name="is_available" @if(old('is_available') != null) checked @endif> В наличии
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_recommended" @if(old('is_recommended') != null) checked @endif> Рекомендованный продукт
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_bestseller" @if(old('is_bestseller') != null) checked @endif> Бестселлер
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Категория</label>
                                        <select class="form-control select2" style="width: 100%;" id="category"
                                                name="category_id">
                                            <option disabled selected>Выберите категорию</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <h4>Атрибуты</h4>
                                    <div class="attributes-box">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <a class="btn btn-default pull-right" href="{{ route('products.index') }}">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="images-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Выбрать изображение</h4>
                </div>
                <div style="display: flex; flex-wrap: wrap;">
                    @foreach ($files as $file)
                        <div class="image-box">
                            <div class="image-container">
                                <img src="/{{ $file }}"
                                     style="max-width: 150px; height: 100px; object-fit: contain">
                                <button class="select-image" data-file="{{ $file }}">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <span class="file-name">{{ str_replace('uploads/products/', '', $file) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@include('ckfinder::setup')
@push('scripts')
    <script src="/js/admin/select2.full.min.js"></script>
    <script src="/js/admin/ckeditor.js"></script>
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

        let catalogeditor = CKEDITOR.replace('catalog_description');
        CKFinder.setupCKEditor(shorteditor);

        $('.select2').select2();

        function loadAttributes() {
            $.ajax({
                type: 'GET',
                url: '/admin/products/get-attributes',
                data: {
                    id: $("#category").val(),
                },
                success: function (data) {
                    console.log(data);
                    let html = '';

                    data.attributes.forEach(item=> {
                        html += '<div class="form-group">' +
                            '<label for="title">' + item.title + '</label><br>' +
                            '<div class="attr-box"><select class="select2-attrs" id="attribute-' + item.id + '" name="attribute-' + item.id + '"><option value="unset">Не указан</option>';
                            data.characteristics.forEach(list=> {
                                if (list.attr == item.id) {
                                    list.items.forEach(item=> {
                                        html += '<option value="' + item.value + '">' + item.value + '</option>'
                                    });
                                }
                            });

                        html += '</select>' + '<input class="form-control" type="text" name="attribute-' + item.id + '" disabled="disabled" style="display: none;"><button type="button" class="btn btn-sm btn-success change-input-type"><i class="fa fa-pencil"></i></button></div>' +
                            '</div>';
                    });

                    $('.attributes-box').html(html);

                    $('.select2-attrs').select2();
                },
                error: function () {
                    swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                }
            });
        }

        $('#category').on('select2:select', function (e) {
            loadAttributes();
        });

        $(document).on('click', '.change-input-type', function() {
            if ($(this).parent().find('input').is('input[disabled]')) {
                $(this).parent().find('input').removeAttr('disabled');
                $(this).parent().find('input').show();
                $(this).parent().find('.select2').hide();
                $(this).parent().find('select').attr('disabled', 'disabled');

            } else {
                $(this).parent().find('select').removeAttr('disabled');
                $(this).parent().find('input').attr('disabled', 'disabled');
                $(this).parent().find('.select2').show();
                $(this).parent().find('input').hide();
            }
        });

        let fileInput;

        $('.select-from-server').on('click', function () {
            fileInput = $(this).data('file');
        });

        $('.select-image').on('click', function () {
            $('#images-modal').modal('hide');
            let image = $(this).data('file');

            $(fileInput).attr('type', 'text');
            $(fileInput).val(image);

            let preview = $(fileInput).data('preview');
            $(preview).attr('src', '/' + image);
            $(preview).show();
            $(preview).addClass("remove-image");
        });

        $(document).on('click', '.remove-image', function () {
            $(this).removeClass('remove-image');
            $(this).hide();
            let id = $(this).attr('id');
            console.log(id);
            $('.has-preview[data-preview="#' + id + '"]').val('').attr('type', 'file');
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
    <style>
        .image-box {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            flex-direction: column;
            position: relative;
            width: 200px;
            height: 200px;
        }

        .image-container {
            position: relative;
        }

        .file-name {
            font-weight: bold;
            display: block;
            margin-top: 5px;
        }

        button.select-image {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            display: block;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            color: #FFF;
            font-size: 28px;
            transition: 300ms;
            opacity: 0;
            border: none;
        }

        button.select-image:hover {
            opacity: 1;
        }

        .remove-image {
            cursor: pointer;
            transition: 300ms;
        }

        .remove-image:hover {
            opacity: 0.4;
        }

        .box-body .row .row {
            margin-bottom: 10px;
        }

        .select2-container {
            width: 100% !important;
        }

        .attr-box {
            display: flex;
        }
    </style>
@endpush
