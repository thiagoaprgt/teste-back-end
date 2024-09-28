<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="../assets/css/login.css">
        <link rel="stylesheet" href="../assets/css/importFile.css">
        <link rel="stylesheet" href="../assets/css/searchFilters.css">
        <title>Usuario Criado</title>
        @include('bootstrap/css')
    </head>
    <body>

        @include('productsTemplate/productsNavBar')

        <div class="alert alert-info visually-hidden" id="message" role="alert"> </div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">

        <div id="searchFilters">

            @include('productsTemplate/searchFilters')

        </div>

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
                <th><a href="/getProdcutById/{{ $product->id }}">✏️</a></th>
                <th><button onclick="deleteProduct({{$product->id}})">🗑️</button></th>
            </tr>

            @endforeach

        </table>
        
    </body>

    @include('bootstrap/js')

    <script src="../assets/js/products/getAllProducts.js"></script>
    <script src="../assets/js/import/importJsonFromTxt.js"></script>

</html>