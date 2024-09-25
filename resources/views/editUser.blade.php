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
                    <label for="exampleInputEmail1" class="form-label">Email atual</label>
                        <input name="email"  type="email" class="form-control border border-primary" id="email">                    
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Novo email</label>
                        <input name="newEmail"  type="email" class="form-control border border-primary" id="newEmail">                    
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha atual</label>
                    <input name="password" type="password" class="form-control border border-primary" id="password">
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">Nova senha</label>
                    <input name="newPassword" type="password" class="form-control border border-primary" id="newPassword">
                </div>
                
                <div>
                <button class="btn btn-primary" id="submit">Cadastrar</button>
                <a href="/" class="btn btn-primary">Login</a>
                </div>

                
            
        </div>
        
    </body>

    @include('bootstrap/js')

    <script src="assets/js/editUser.js"></script>

</html>