<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="/assets/css/login.css">
        <title>Usuario Criado</title>
        @include('bootstrap/css')
    </head>
    <body>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>URL da imagem</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            @foreach ($products as $product)

            <tr>
                <th>{{ $product->id }}</th>
                <th>{{ $product->name }}</th>
                <th>{{ $product->price }}</th>
                <th>{{ $product->description }}</th>
                <th>{{ $product->category }}</th>
                <th>{{ $product->image_url }}</th>
                <th><a href=""></a>✏️</th>
                <th><a href=""></a>🗑️</th>
            </tr>

            @endforeach

        </table>
        
    </body>

    @include('bootstrap/js')

    

</html>