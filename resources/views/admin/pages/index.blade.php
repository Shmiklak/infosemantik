@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Страницы
            <small>Здесь вы можете увидеть список простых страниц вашего сайта</small>
        </h1>
    </section>


    <section class="content container-fluid">
        <div class="categories-container">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Список</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Заголовок</th>
                                    <th>Ссылка на страницу</th>
                                    <th>Краткое описание</th>
                                    <th>Дата публикации</th>
                                    <th style="width: 100px">Действия</th>
                                </tr>
                                @foreach ($pages as $key=>$item)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            page/{{ $item->slug }}
                                        </td>
                                        <td>
                                            {!! strip_tags($item->shortDescription()) !!}
                                        </td>
                                        <td>
                                            {{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pages.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" class="destroy-form" action="{{ route('pages.destroy', $item->id) }}">
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
                        <a class="btn btn-primary" href="{{ route('pages.create') }}">Добавить страницу</a>
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
