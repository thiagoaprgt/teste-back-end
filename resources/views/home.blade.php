<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @include('bootstrap/css')
        <link rel="stylesheet" href="assets/css/login.css">
        <title>Home</title>
    </head>

    <body>

    <a type="button" class="btn btn-danger" href="/logout">logout</a>
       
    
        <div class="login">

            <div class="container text-center">
                
                <div class="row align-items-center">

                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dados Pessoais</h5>
                                <p class="card-text">Aqui você poderá alterar suas informações e excluir sua conta</p>
                                <a href="/editUser" class="btn btn-primary">Atualizar dados</a>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Produtos</h5>
                                <p class="card-text">Aqui você poderá adicionar, atualizar e deletar os produtos</p>
                                <a href="/productsTemplate/getAllProducts" class="btn btn-primary">Gerenciar produtos</a>
                            </div>
                        </div>
                    </div>  

                </div>

                

            </div>
        </div>

       
            
    </body>

    @include('bootstrap/js')

</html>