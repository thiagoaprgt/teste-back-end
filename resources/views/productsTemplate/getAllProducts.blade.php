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

        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-danger">
                <a href="/logout" class="text-white text-decoration-none">Logout</a>
            </button>
            <button type="button" class="btn btn-success">
                <a href="/newProducts" class="text-white text-decoration-none">Cadastrar novos produtos</a>
            </button>

            <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Categoria
                    </button>
                <ul class="dropdown-menu">                    
                    <li class="d-flex align-items-start">
                        <div>                            
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $key => $arrayGroupby)
                            <option value="{{ $key }}">{{ $key }}</option>
                            @endforeach
                                                        
                        </select>

                            <button class="btn btn-success" id="deleteCategory">➕</button>
                            <button class="btn btn-danger" id="deleteCategory">🗑️</button>                            
                        </div>
                                            
                    </li>
                </ul>
            </div>
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
                <th><a href="/deleteProduct/{{ $product->id }}">🗑️</a></th>
            </tr>

            @endforeach

        </table>
        
    </body>

    @include('bootstrap/js')

    

</html>