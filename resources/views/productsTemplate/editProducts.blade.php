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

            <div class="alert alert-info visually-hidden" id="message" role="alert"> </div>
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="laravelSecurityToken">

            <input type="hidden" name="id" value="{{ $product->id }}" type="number" class="form-control border border-primary" id="id">                    
                            
                

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input name="name" value="{{ $product->name }}" type="text" class="form-control border border-primary" id="name">                    
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Preço</label>
                    <input name="price" value="{{ $product->price }}"  type="number" class="form-control border border-primary" id="price">                    
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Descrição do produto</label>
                    <input name="description" value="{{ $product->description }}" type="textarea" class="form-control border border-primary" id="description">                    
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <input name="category" value="{{ $product->category }}" type="text" class="form-control border border-primary" id="category">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Url da imagem</label>
                <input name="image_url" value="{{ $product->image_url }}" type="text" class="form-control border border-primary" id="image_url">
            </div>
            
            <div>
            <button class="btn btn-primary" id="submit">Salvar alterações</button>
                <a href="/productsTemplate/getAllProducts" class="btn btn-primary">Ver produtos</a>
            </div>

                
            
        </div>
        
    </body>

    @include('bootstrap/js')
    
     <script src="../../assets/js/products/editProducts.js"></script>

</html>