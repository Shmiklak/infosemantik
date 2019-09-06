@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Продукты
            <small>Здесь вы можете увидеть список всех продуктов</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{ route('products.create') }}">Добавить продукт</a>
                        <div class="btn-group pull-right">
                            <a href="{{ route('products.images') }}" class="btn btn-instagram"><i class="fa fa-image" style="margin-right: 5px;"></i> Изображения</a>
                            <a href="{{ route('products.excel') }}" class="btn btn-success"><i class="fa fa-table" style="margin-right: 5px;"></i>Получить таблицу продуктов</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#importModal"><i class="fa fa-upload" style="margin-right: 5px;"></i>Обновить базу</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="listing" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Изображение</th>
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
    <div id="trashModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content" style="padding: 15px;">
                <form class="delete-form">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center">Вы действительно хотите удалить этот
                        продукт?</h4>
                    <input type="hidden" name="id" id="delete-id">
                    <div style="margin-top: 10px; display: flex; justify-content:center;">
                        <button type="button" class="btn btn-primary delete-product pull-left" style="margin-right: 10px;">
                            Удалить
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div id="importModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="padding: 15px;">
                <form class="import-form" method="POST" action="{{ route('products.import') }}" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center">
                        Загрузить таблицу</h4>
                    <div style="padding: 15px; display: flex; justify-content: center;">
                    <input type="file" name="excel" id="excel">
                    </div>
                    <div style="margin-top: 10px; display: flex; justify-content:center;">
                        <button type="submit" class="btn btn-primary pull-left" style="margin-right: 10px;" onclick="return confirm('Вы уверены?')">
                            Загрузить
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                    "url": "{{ route('products.data') }}",
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
                            return '<img style="max-width: 150px" src="/' + val.image + '">';
                        }
                    },
                    {
                        targets: 3,
                        data: null,
                        searchable: false,
                        render: function (row, type, val, meta) {
                            return '<a href="/admin/products/' + val.id + '/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <button class="btn btn-danger btn-delete" data-id="' + val.id + '" data-toggle="modal" data-target="#trashModal"><i class="fa fa-trash"></i></button>';
                        }
                    }
                ]
            });

            function deleteProduct() {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/products/delete',
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

            $('.delete-product').on('click', function () {
                deleteProduct();
            });

            $(document).on('click', '.btn-delete', function () {
                let id = $(this).data('id');
                $("#delete-id").val(id);
            });
        });
    </script>
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', '', "success");
        </script>
    @endif
@endpush
@push('styles')
    <link rel="stylesheet" href="/js/admin/dataTables.bootstrap.min.css">
@endpush
