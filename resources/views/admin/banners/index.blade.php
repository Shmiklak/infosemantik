@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Баннеры
            <small>Здесь вы можете увидеть список баннеров на главной странице</small>
        </h1>
    </section>


    <section class="content container-fluid">
        <div class="categories-container">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Список</h3>
                        <a class="btn btn-primary pull-right" href="{{ route('banners.create') }}">Добавить баннер</a>
                    </div>
                    <div class="box-body">
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Заголовок</th>
                                    <th>Изображение</th>
                                    <th style="width: 100px">Действия</th>
                                </tr>
                                @foreach($banners as $key=>$banner)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            <img src="/{{ $banner->image }}" style="width: 300px">
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('banners.edit', $banner->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" class="destroy-form" action="{{ route('banners.destroy', $banner->id) }}">
                                                    @csrf
                                                    {{ method_field("DELETE") }}
                                                    <button onclick="return confirm('Удалить?')" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', ' ', "success");
        </script>
    @endif
@endpush
