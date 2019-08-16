@extends('layouts.app')
@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Сравнение продуктов</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title"><h1>Сравнение продуктов</h1></div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="table-responsive">
                    <table class="compare-table">
                        <tbody>
                        <tr>
                            <th>Продукт</th>
                            @foreach($products as $product)
                                <td>
                                    <a class="compare-table__product-link"
                                       href="{{ route('product', $product->slug) }}">
                                        <div class="compare-table__product-image">
                                            <img src="/{{ $product->main_image }}"
                                                 alt="">
                                        </div>
                                        <div class="compare-table__product-name">
                                            {{ $product->title }}
                                        </div>
                                    </a>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Наличие</th>
                            @foreach($products as $product)
                                <td>
                                    @if($product->is_available == 1)
                                        <span class="compare-table__product-badge badge badge-success">В наличии</span>
                                    @endif
                                    @if($product->is_available == 0)
                                        <span
                                            class="compare-table__product-badge badge badge-danger">Нет в наличии</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @foreach ($attributesNames as $row)
                            <tr>
                                <th>{{ $row['title'] }}</th>
                                @foreach ($products as $product)
                                    <td>
                                        {!! $product->getValueOfAttribute($row['id'], $product->id) !!}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            @foreach ($products as $product)
                                <td>
                                    <form method="POST" action="{{ route('compare-remove')  }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-secondary btn-sm remove-from-comparison">
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
