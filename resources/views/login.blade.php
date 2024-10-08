<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="/assets/css/login.css">
        <title>Document</title>
        @include('bootstrap/css')
    </head>
    <body>

        <div class="login">
            <form action="/loginAuthentication" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" value="" type="email" class="form-control border border-primary" id="email">                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input name="password" type="password" class="form-control border border-primary" id="password">
                </div>      


                
                    <div class="container text-center">

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">login</button>
                            </div>
                            <div class="col">
                                <a href="/newUser" class="btn btn-primary" >Cadastrar</a>
                            </div>                            
                            
                        </div>                         
                       
                    </div>    

            </form>
        </div>

        
        
    </body>

    @include('bootstrap/js')

    <script src="assets/js/deleteUser.js"></script>

</html>