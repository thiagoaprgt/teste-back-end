<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        
        <link rel="stylesheet" href="/assets/css/login.css">
        <title>nova Categoria</title>
        @include('bootstrap/css')
    </head>
    <body>

    <div class="login">

        <div class="alert alert-info visually-hidden" id="message" role="alert"> </div>
            
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">


        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            <input name="category" type="text" class="form-control border border-primary" id="category">
        </div>
        
        <div>
            <button class="btn btn-primary" id="submit">Salvar</button>
            <a href="/productsTemplate/getAllProducts" class="btn btn-primary">Ver produtos</a>
        </div>            
        
    </div>
        
    </body>

    @include('bootstrap/js')

    <script src="assets/js/products/newCategory.js"></script>

</html>