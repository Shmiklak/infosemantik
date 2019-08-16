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
                    <p>Нет продуктов для сравнения</p>
                </div>
            </div>
        </div>
    </div>
@endsection
