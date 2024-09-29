
@foreach ($products as $product)

<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->description }}</td>
    <td>{{ $product->category }}</td>
    <td>{{ $product->image_url }}</td>
    <td><a href="/getProdcutById/{{ $product->id }}">✏️</a></td>
    <td><button onclick="deleteProduct({{$product->id}})">🗑️</button></td>
</tr>

@endforeach
