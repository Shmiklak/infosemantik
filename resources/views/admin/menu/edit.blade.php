@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Изменение пункта меню
            <small>Здесь вы можете изменить пункт меню {{ $item->title }}</small>
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('menu.update', $item->id)}}">
                        @method("PUT")
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Название пункта</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Новости" value="{{ $item->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                <input type="text" class="form-control" id="link" name="link"
                                       placeholder="news" value="{{ $item->link }}">

                                <p class="help-block">Если следующее поле отмечено, оставьте это поле пустым.</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_pricelist" @if($item->is_pricelist == 1) checked @endif> Скачать прайс лист
                                </label>
                            </div>
                            <input type="hidden" name="order" value="{{ $item->order }}">
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
