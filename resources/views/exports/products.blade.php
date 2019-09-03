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
        <th style="font-weight: bold">Описание для каталога</th>
        <th style="font-weight: bold">Наличие</th>
        <th style="font-weight: bold">Отображать в рекомендованных</th>
        <th style="font-weight: bold">Бестселлер</th>
        <th style="font-weight: bold">Дата публикации</th>
        @foreach($attributes as $attribute)
            <th style="font-weight: bold">{{ $attribute->title }}  - ID: ({{ $attribute->id }})</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->custom_id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->category->title }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->main_image) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_1) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_2) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_3) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_4) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_5) }}</td>
            <td>{{ str_replace('uploads/products/', '', $product->image_6) }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->short_description }}</td>
            <td>{{ $product->catalog_description }}</td>
            <td>{{ $product->is_available }}</td>
            <td>{{ $product->is_recommended }}</td>
            <td>{{ $product->is_bestseller }}</td>
            <td>"{{ $product->created_at }}"</td>
            @foreach($attributes as $attribute)
                <td>
                    {{ $product->getValueOfAttribute($attribute->id, $product->id) }}
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
