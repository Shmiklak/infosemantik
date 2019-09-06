<table>
    <thead>
    <tr>
        <th style="font-weight: bold">ID*</th>
        <th style="font-weight: bold">Уникальный ключ*</th>
        <th style="font-weight: bold">Название продукта*</th>
        <th style="font-weight: bold">Наличие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->custom_id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->is_available }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
