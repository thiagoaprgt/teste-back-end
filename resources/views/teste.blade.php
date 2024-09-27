<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Product on Json</title>
</head>
<body>
    <pre>
        <p name="_token" value="{{ csrf_token() }}" id="_token">Sem o token do laravel não é possível lançar requisições HTTP</p>
        <p>o atributo name tem que ser _token e o atributo value tem que ser esse csrf_token() </p>
        
        <button id="importJsonList">importJson</button>
       
    </pre>
</body>

<script>
    
    function json() {
        let teste = [

            {
                
                name: 'nome teste',
                price: 10,
                description: 'descrição teste',
                category: 'categoria teste',
                image: 'imagem teste'

            },

            {
                
                name: 'nome teste',
                price: 10,
                description: 'descrição teste',
                category: 'categoria teste',
                image: 'imagem teste'

            },

            {
                
                name: 'nome teste',
                price: 10,
                description: 'descrição teste',
                category: 'categoria teste',
                image: 'imagem teste'

            }

        ];
       

        return JSON.stringify(teste);

    }       
        

            
    async function importJson() {

        const form = new FormData();
        form.append('_token', document.querySelectorAll('#_token')[0].getAttribute('value'));
        form.append('json', json());

        const response = await fetch("/importProducts", {
        method: "POST",
        body: form,
    });

    await console.log("Deu certo!!!");

        

    }


    function teste() {
        let test = new FormData();
        teste.append('json', "teste");

        return teste;
    }
    

    const importJsonList = document.querySelectorAll('#importJsonList')[0];

    importJsonList.addEventListener('click', async function() {
        importJson();
    });

    
</script>



</html>