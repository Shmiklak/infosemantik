<table>
    <thead>
    <tr>
        <th style="font-weight: bold">Уникальный ключ*</th>
        <th style="font-weight: bold">Название продукта*</th>
        <th style="font-weight: bold">Категория*</th>
        <th style="font-weight: bold">Главное изображение*</th>
        <th style="font-weight: bold">Изображение 1</th>
        <th style="font-weight: bold">Изображение 2</th>
        <th style="font-weight: bold">Изображение 3</th>
        <th style="font-weight: bold">Изображение 4</th>
        <th style="font-weight: bold">Изображение 5</th>
        <th style="font-weight: bold">Изображение 6</th>
        <th style="font-weight: bold">Описание*</th>
        <th style="font-weight: bold">Краткое описание</th>
        <th style="font-weight: bold">Наличие</th>
        <th style="font-weight: bold">Отображать в рекомендованных</th>
        <th style="font-weight: bold">Бестселлер</th>
        <th style="font-weight: bold">Дата публикации</th>
        @foreach($attributes as $attribute)
            <th style="font-weight: bold">{{ $attribute->title }} - ID: ({{ $attribute->id }})</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>"{{ \Carbon\Carbon::now() }}"</td>
        @foreach($attributes as $attribute)
            <td></td>
        @endforeach
    </tr>
    </tbody>
</table>
