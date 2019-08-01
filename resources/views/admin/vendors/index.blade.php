@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Вендоры
            <small>Здесь вы можете увидеть список вендоров на главной странице</small>
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
                                    <th>Изображение</th>
                                    <th style="width: 100px">Действия</th>
                                </tr>
                                @foreach($vendors as $key=>$vendor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="/{{ $vendor->image }}" style="width: 300px">
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('vendors.edit', $vendor->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" class="destroy-form" action="{{ route('vendors.destroy', $vendor->id) }}">
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
                        <a class="btn btn-primary" href="{{ route('vendors.create') }}">Добавить вендора</a>
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
