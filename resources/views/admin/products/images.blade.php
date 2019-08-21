@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Изображения
            <small>Здесь вы можете увидеть список всех изображений для продуктов</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Вернуться к продуктам</a>
                        <a class="btn btn-success" data-toggle="modal" data-target="#add">Добавить изображения</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div style="display: flex; flex-wrap: wrap;">
                            @foreach ($files as $file)
                                <div class="image-box">
                                    <div class="image-container">
                                        <img src="/{{ $file }}"
                                             style="max-width: 150px; height: 100px; object-fit: contain">
                                        <button class="delete-image" data-file="{{ $file }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    <span class="file-name">{{ str_replace('uploads/products/', '', $file) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="box-footer">

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>

    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content" style="padding: 15px;">
                <form method="POST" action="{{ route('products.upload_images') }}" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center">
                        Загрузить изображения
                    </h4>
                    <div style="padding: 15px; display: flex; justify-content: center;">
                        <input type="file" name="images[]" id="images" multiple>
                    </div>
                    <div style="margin-top: 10px; display: flex; justify-content:center;">
                        <button type="submit" class="btn btn-primary pull-left" style="margin-right: 10px;">
                            Загрузить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('styles')
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

        button.delete-image {
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

        button.delete-image:hover {
            opacity: 1;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.delete-image').on('click', function() {
            let confirmation  = confirm('Вы уверены?');

            if (confirmation) {
                let $this = $(this);

                $.ajax({
                    type: 'DELETE',
                    url: '/admin/products/images/delete',
                    data: {
                        file: $this.data('file'),
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        $this.parent().parent().remove();
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            else {
                return 0;
            }
        });
    </script>
@endpush
