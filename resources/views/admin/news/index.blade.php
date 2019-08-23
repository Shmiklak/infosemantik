@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Новости
            <small>Здесь вы можете увидеть список новостей вашего сайта</small>
        </h1>
    </section>


    <section class="content container-fluid">
        <div class="categories-container">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Список</h3>
                        <a class="btn btn-primary pull-right" href="{{ route('news.create') }}">Добавить новость</a>
                    </div>
                    <div class="box-body">
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Заголовок</th>
                                    <th>Краткое описание</th>
                                    <th>Изображение</th>
                                    <th>Дата публикации</th>
                                    <th style="width: 100px">Действия</th>
                                </tr>
                                @foreach ($news as $key=>$item)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            {!! strip_tags($item->shortDescription()) !!}
                                        </td>
                                        <td>
                                            <img src="/{{ $item->image }}" style="width: 300px">
                                        </td>
                                        <td>
                                            {{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('news.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" class="destroy-form" action="{{ route('news.destroy', $item->id) }}">
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
