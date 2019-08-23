@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Атрибуты
            <small>Здесь вы можете увидеть список всех атрибутов</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Атрибуты</h3>
                        <a class="btn btn-primary call-add pull-right" data-toggle="modal" data-target="#addAttribute">Добавить атрибут</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="listing" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название атрибута</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>

    <div id="addAttribute" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form class="add-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Добавить атрибут</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control select2" style="width: 100%;" id="categories"
                                    name="categories" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Название</label>
                            <input class="form-control" type="text" name="title" id="attribute-title"
                                   placeholder="Тип устройства">
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="has_ckeditor" name="has_ckeditor"> Включить CKEditor
                            </label>
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="shown_at_top" name="shown_at_top"> Показывать вверху страницы продукта
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add-attribute pull-left">
                            Добавить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form class="edit-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Редактировать атрибут</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="attribute-id">
                            <label>Категория</label>
                            <select class="form-control select2" style="width: 100%;" id="category_id2"
                                    name="category_id" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Название</label>
                            <input class="form-control" type="text" name="title" id="attribute-title2"
                                   placeholder="Тип устройства">
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="has_ckeditor2" name="has_ckeditor2"> Включить CKEditor
                            </label>
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="shown_at_top2" name="shown_at_top2"> Показывать вверху страницы продукта
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary update-attribute pull-left">
                            Обновить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="trashModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content" style="padding: 15px;">
                <form class="delete-form">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center">Вы действительно хотите удалить этот
                        атрибут?</h4>
                    <input type="hidden" name="id" id="delete-id">
                    <div style="margin-top: 10px; display: flex; justify-content:center;">
                        <button type="button" class="btn btn-primary delete-attribute pull-left" style="margin-right: 10px;">
                            Удалить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="/js/admin/jquery.dataTables.min.js"></script>
    <script src="/js/admin/dataTables.bootstrap.min.js"></script>
    <script src="/js/admin/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {
            let table = $('#listing').DataTable({
                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                },
                ajax: {
                    "url": "{{ route('attributes.data') }}",
                    "dataSrc": ""
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                ],
                columnDefs: [
                    {
                        targets: 2,
                        data: null,
                        searchable: false,
                        render: function (row, type, val, meta) {
                            return '<button class="btn btn-primary btn-update" data-id="' + val.id + '" data-toggle="modal" data-categories="' + val.categories + '" data-title="' + val.title + '"  data-ck="' + val.has_ckeditor + '" data-shown="' + val.shown_at_top + '" data-target="#editModal"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger btn-delete" data-id="' + val.id + '" data-toggle="modal" data-target="#trashModal"><i class="fa fa-trash"></i></button>';
                        }
                    }
                ]
            });

            function addAttribute() {
                $.ajax({
                    type: 'POST',
                    url: '/admin/attributes/store',
                    data: {
                        categories: $('#categories').val(),
                        title: $('#attribute-title').val(),
                        has_ckeditor: $("#has_ckeditor").prop('checked')
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        table.ajax.reload();
                        $('#addAttribute').modal('hide');
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            function updateAttribute() {
                $.ajax({
                    type: 'PUT',
                    url: '/admin/attributes/update',
                    data: {
                        id: $("#attribute-id").val(),
                        categories: $('#category_id2').val(),
                        title: $('#attribute-title2').val(),
                        has_ckeditor: $("#has_ckeditor2").prop('checked')
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        table.ajax.reload();
                        $('#editModal').modal('hide');
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            function deleteAttribute() {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/attributes/delete',
                    data: {
                        id: $("#delete-id").val(),
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        $("#trashModal").modal('hide');
                        table.ajax.reload();
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            $('.select2').select2();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".call-add").on('click', function() {
                $('#attribute-title').val('');
                $("#has_ckeditor").prop('checked', false);
            });

            $('.add-attribute').on('click', function () {
                addAttribute();
            });

            $('.update-attribute').on('click', function () {
                updateAttribute();
            });

            $('.delete-attribute').on('click', function () {
                deleteAttribute();
            });

            $(document).on('click', '.btn-update', function () {
                let str = $(this).data('categories');
                let categories;
                if (str.toString().indexOf(',') > -1) {
                    categories = $(this).data('categories').split(',');
                }
                else {
                    categories = str;
                }
                let title = $(this).data('title'),
                    ckeditor = $(this).data('ck'),
                    shown = $(this).data('shown'),
                    id = $(this).data('id');

                $(".edit-form #category_id2").val(categories).change();
                $(".edit-form #attribute-title2").val(title);
                $(".edit-form #attribute-id").val(id);

                if (ckeditor == 1) {
                    $("#has_ckeditor2").prop('checked', true);
                } else {
                    $("#has_ckeditor2").prop('checked', false);
                }

                console.log(shown);

                if (shown == 1) {
                    $("#shown_at_top2").prop('checked', true);
                } else {
                    $("#shown_at_top2").prop('checked', false);
                }
            });

            $(document).on('click', '.btn-delete', function () {
                let id = $(this).data('id');
                $("#delete-id").val(id);
            });
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="/js/admin/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/js/admin/select2.min.css">
@endpush
