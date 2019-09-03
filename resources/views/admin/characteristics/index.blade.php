@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Характеристики
            <small>Здесь вы можете увидеть список всех характеристик</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Характеристики</h3>
                        <a class="btn btn-primary call-add pull-right" data-toggle="modal" data-target="#add-characteristics">Добавить</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="listing" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Значение</th>
                                <th>Атрибут</th>
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

    <div id="add-characteristics" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form class="add-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Добавить характеристику</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Название</label>
                            <input class="form-control" type="text" name="title" id="char-title">
                        </div>
                        <div class="form-group">
                            <label>Атрибут</label>
                            <select class="form-control select2" style="width: 100%;" id="attributes"
                                    name="attributes">
                                @foreach($attributes as $attr)
                                    <option value="{{ $attr->id }}">{{ $attr->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="shown_in_filter" name="shown_in_filter"> Включить в фильтрацию
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add-characteristic pull-left">
                            Добавить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="edit-characteristics" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form class="edit-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Изменить характеристику</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="char-id" name="id">
                        <div class="form-group">
                            <label>Название</label>
                            <input class="form-control" type="text" name="title" id="char-title2">
                        </div>
                        <div class="form-group">
                            <label>Атрибут</label>
                            <select class="form-control select2" style="width: 100%;" id="attributes2"
                                    name="attributes">
                                @foreach($attributes as $attr)
                                    <option value="{{ $attr->id }}">{{ $attr->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" id="show_in_filter2" name="show_in_filter"> Включить в фильтрацию
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit-characteristic pull-left">
                            Изменить
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
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
                    "url": "{{ route('characteristics.data') }}",
                    "dataSrc": ""
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'value', name: 'value'},
                    {data: 'attribute', name: 'attribute'},
                ],
                columnDefs: [
                    {
                        targets: 3,
                        data: null,
                        searchable: false,
                        render: function (row, type, val, meta) {
                            return '<button class="btn btn-primary btn-update" data-id="' + val.id + '" data-value="' + val.value + '" data-show="' + val.show + '" data-attr="' + val.attribute_id + '" data-toggle="modal"  data-target="#edit-characteristics"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger btn-delete" data-id="' + val.id + '" data-toggle="modal" data-target="#trashModal"><i class="fa fa-trash"></i></button>';
                        }
                    }
                ]
            });

            function createChar() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('characteristics.store') }}',
                    data: {
                        attribute_id: $('#attributes').val(),
                        value: $('#char-title').val(),
                        show_in_filter: $('#show_in_filter').val(),
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        table.ajax.reload();
                        $('#add-characteristics').modal('hide');
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            function updateChar() {
                $.ajax({
                   type: 'PUT',
                    url: '{{ route('characteristics.update') }}',
                    data: {
                        id: $("#char-id").val(),
                        attribute_id: $('#attributes2').val(),
                        value: $('#char-title2').val(),
                        show_in_filter: $('#show_in_filter2').val(),
                    },
                    success: function (data) {
                        swal(data.success, data.message, "success");
                        table.ajax.reload();
                        $('#edit-characteristics').modal('hide');
                    },
                    error: function () {
                        swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                    }
                });
            }

            function deleteChar() {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('characteristics.delete') }}',
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

            $(".add-characteristic").on('click', function() {
               createChar();
            });

            $('.select2').select2();

            $(document).on('click', '.btn-update', function () {
                let value = $(this).data('value'),
                    show = $(this).data('show'),
                    id = $(this).data('id'),
                    attr = $(this).data('attr');

                $(".edit-form #char-title2").val(value);
                $(".edit-form #attributes2").val(attr).change();
                $(".edit-form #char-id").val(id);

                if (show == 1) {
                    $("#shown_in_filter2").prop('checked', true);
                } else {
                    $("#shown_in_filter2").prop('checked', false);
                }
            });

            $(".edit-characteristic").on('click', function() {
                updateChar();
            });

            $(document).on('click', '.btn-delete', function () {
                let id = $(this).data('id');
                $("#delete-id").val(id);
            });

            $('.delete-attribute').on('click', function () {
                deleteChar();
            });
        });


    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="/js/admin/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/js/admin/select2.min.css">
@endpush
