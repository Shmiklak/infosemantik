@push('styles')
    <style type="text/css">
        .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: 600px;
            list-style: none;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .dd-list .dd-list {
            padding-left: 30px;
        }

        .dd-collapsed .dd-list {
            display: none;
        }

        .dd-item,
        .dd-empty,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 40px;
            font-size: 13px;
            line-height: 20px;
            background: #ecf0f5;
        }

        .dd-item-wrapper {
            /*display: flex;*/
            border: 1px solid #ccc;
            background: #fafafa;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            margin: 5px 0;
            align-items: center;
            height: 31px;
        }

        .dd-handle {
            display: block;
            width: 40px;
            height: 40px;
            margin-right: 15px;
            padding: 4px 7px;
            color: #FFF;
            text-decoration: none;
            border: 1px solid #367fa9;
            background: #367fa9;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            cursor: pointer;
            font-size: 23px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dd-handle:hover {
            color: #649ea9;
            background: #fff;
        }

        .dd-item > button {
            display: block;
            position: relative;
            cursor: pointer;
            float: left;
            width: 25px;
            height: 20px;
            margin: 5px 0;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: transparent;
            font-size: 12px;
            line-height: 1;
            text-align: center;
            font-weight: bold;
        }

        .dd-item > button:before {
            content: '+';
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0;
        }

        .dd-item > button[data-action="collapse"]:before {
            content: '-';
        }

        .dd-placeholder,
        .dd-empty {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999;
        }

        .dd-dragel > .dd-item .dd-handle {
            margin-top: 0;
        }

        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        }

        /**
         * Nestable Extras
         */

        .nestable-lists {
            display: block;
            clear: both;
            padding: 30px 0;
            width: 100%;
            border: 0;
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
        }

        #nestable-menu {
            padding: 0;
            margin: 20px 0;
        }

        #nestable-output,
        #nestable2-output {
            width: 100%;
            height: 7em;
            font-size: 0.75em;
            line-height: 1.333333em;
            font-family: Consolas, monospace;
            padding: 5px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background: linear-gradient(top, #bbb 0%, #999 100%);
        }

        #nestable2 .dd-handle:hover {
            background: #bbb;
        }

        #nestable2 .dd-item > button:before {
            color: #fff;
        }

        @media only screen and (min-width: 700px) {

            .dd {
                /*float: left;*/
                width: 70%;
            }

            .dd + .dd {
                margin-left: 2%;
            }

        }

        .dd-hover > .dd-handle {
            background: #649ea9 !important;
        }

        /**
         * Nestable Draggable Handles
         */

        .dd3-content {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px 5px 40px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd3-content:hover {
            color: #649ea9;
            background: #fff;
        }

        .dd-dragel > .dd3-item > .dd3-content {
            margin: 0;
        }

        .dd3-item > button {
            margin-left: 30px;
        }

        .dd3-handle {
            position: absolute;
            margin: 0;
            left: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .dd3-handle:before {
            content: '≡';
            display: block;
            position: absolute;
            left: 0;
            top: 3px;
            width: 100%;
            text-align: center;
            text-indent: 0;
            color: #fff;
            font-size: 20px;
            font-weight: normal;
        }

        .dd3-handle:hover {
            background: #ddd;
        }

        /**
         * Socialite
         */

        .socialite {
            display: block;
            float: left;
            height: 35px;
        }


        li.dd-item > button {
            display: none;
        }

        li.dd-item .btn-group {
            margin-left: auto;
            display: flex;
            align-items: center;
            font-size: 20px;
        }

        li.dd-item .btn-group a {
            color: #000;
            color: #367fa9;
            margin-left: 5px;
        }

        li.dd-item .btn-group button {
            background: none;
            border: none;
            cursor: pointer;
            color: #367fa9;
            margin-left: 5px;
        }

        .dd-handle {
            position: absolute;
            left: 0;
            top: 0;
        }

        .item-content {
            display: flex;
            padding-left: 65px;
            align-items: center;
            border: 1px solid #367fa9;
            margin: 6px 0;
            border-radius: 5px;
            height: 40px;
            background: #FFF;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
@endpush
@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Меню
            <small>Здесь вы можете изменить главное меню вашего сайта</small>
        </h1>
    </section>

    <section class="content container-fluid">
        <div class="menu-container dd">
            <div class="">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Перетаскивайте элементы мышкой для управления их порядком</h3>
                    </div>
                    <div class="box-body">
                        <ol class="dd-list">
                            @foreach($menu as $item)
                                <li class="dd-item" data-id="{{ $item->id }}">
                                    <div class="dd-handle">
                                        +
                                    </div>
                                    <div class="item-content">
                                        <span class="title">
                                                 {{ $item->title }}
                                            </span>
                                        <div class="btn-group">
                                            <a href="{{ route('menu.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('menu.destroy', $item->id) }}">
                                                @csrf
                                                {{ method_field("DELETE") }}
                                                <button onclick="return confirm('Удалить?')" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="box-footer">
                        <a class="btn btn-primary" href="{{ route('menu.create') }}">Добавить пункт меню</a>
                        <a class="btn btn-success" onclick="updateMenu()">Обновить порядок</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="/js/admin/jquery.nestable.js"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function updateMenu() {
            var output = $('.menu-container').nestable('serialize');

            $.ajax({

                type: 'POST',

                url: '/admin/update-menu',

                data: {categories: output},

                success: function (data) {
                    swal(data.success, data.message, "success");
                },
                error: function () {
                    swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
                }
            });
        }

        $(document).ready(function () {
            $('.menu-container').nestable({
                group: 1,
                maxDepth: 1
            });
        });
    </script>
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', 'Вы можете отредактировать порядок меню', "success");
        </script>
    @endif
@endpush
