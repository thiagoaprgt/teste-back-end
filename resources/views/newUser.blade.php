<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="/assets/css/login.css">
        <title>Cadastro de Usuário</title>
        @include('bootstrap/css')
    </head>
    <body>

        <div class="login">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input name="name"  type="text" class="form-control border border-primary" id="name">                    
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="email"  type="email" class="form-control border border-primary" id="email">                    
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input name="password" type="password" class="form-control border border-primary" id="password">
                </div>
                
                <button class="btn btn-primary" id="submit">Cadastrar</button>
            
        </div>
        
    </body>

    @include('bootstrap/js')

    <script src="assets/js/newUser.js"></script>

</html>