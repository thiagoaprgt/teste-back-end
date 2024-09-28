<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="/assets/css/login.css">
        <link rel="stylesheet" href="/assets/css/importFile.css">
        <title>Usuario Criado</title>
        @include('bootstrap/css')
    </head>
    <body>

        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bara de navegação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Barra de Navegação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                            </a>
                            <ul class="dropdown-menu">                            
                            
                            <li><a class="dropdown-item" href="/newProducts">Cadastrar Produto</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a download class="dropdown-item" href="../assets/txt/products.txt">Modelo de arquivo para importar</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="d-flex mt-3" role="search">
                        <input  type="file" id="importJsonFromTxt" name="importJsonFromTxt" accept=".txt" class="form-control me-2"  placeholder="file">
                        <button id="submitUpload" class="btn btn-outline-success">Importar</button>
                    </div>
                    
                </div>
                </div>
            </div>
        </nav>

        <div class="alert alert-info visually-hidden" id="message" role="alert"> </div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">

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