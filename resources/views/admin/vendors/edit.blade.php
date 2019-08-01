@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Изменение вендора
            <small>Здесь вы можете изменить вендора</small>
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('vendors.update', $vendor->id)}}">
                        @csrf
                        @method("PUT")
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Заголовок</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="LG" value="{{ $vendor->title }}">

                                <p class="help-block">Этот заголовок будет использован только для SEO оптимизации. Оставьте поле пустым, если это не требуется.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ссылка на сайт вендора</label>
                                <input type="text" class="form-control" id="link" name="link"
                                       placeholder="htttps://lg.com" value="{{ $vendor->link }}">

                                <p class="help-block">Оставьте это поле пустым, если оно не требуется.</p>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input type="file" id="image" name="image" class="has-preview" data-preview="#image-preview" accept="image/*">
                                <p class="help-block">Рекомендуемая ширина изображения 300 пикселей.</p>
                            </div>
                            <input type="hidden" name="old_image" value="{{ $vendor->image }}">
                            <div class="upload-preview">
                                <img id="image-preview" style="display:inline-block"  src="/{{ $vendor->image }}"/>
                            </div>



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
