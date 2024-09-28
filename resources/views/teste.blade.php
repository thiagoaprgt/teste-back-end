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
        
        <button id="importJsonList">Importa um JSON genérico para preencher o banco de dados</button>

        
       
    </pre>


    <pre>

        <label for="avatar">Escolha um arquivo extensão .txt com uma string de um JSON</label>

        <input type="file" id="importJsonFromTxt" name="importJsonFromTxt" accept=".txt" />
        <button id="submitUpload">enviar arquivo</button>

        <div id="fileContent"></div>

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
        

            
    async function importJson(jsonContenString) {

        const form = new FormData();
        form.append('_token', document.querySelectorAll('#_token')[0].getAttribute('value'));
        form.append('json', jsonContenString);

        const response = await fetch("/importProducts", {
            method: "POST",
            body: form,
        });

        await console.log("Deu certo!!!");

        

    }



    function textFileReader(HtmlElementFromInputTextFile) {

        let reader = new FileReader();

        reader.readAsText(HtmlElementFromInputTextFile);

        let fileContent = document.querySelectorAll("#fileContent")[0]
        
        reader.addEventListener('load', function() {            

            const jsonContenString = JSON.stringify(this.result);

            const formatJson = jsonContenString.replaceAll(/\\r/g,"")
                .replaceAll(/\\n/g,"")
                .replaceAll(/\\/g,"") 
                .replaceAll(/\\s+$/g,"")                
            ;

            importJson(jsonContenString.replaceAll(/\\r/g,"")
                .replaceAll(/\\n/g,"")
                .replaceAll(/\\/g,"") 
                .replaceAll(/\\s+$/g,"")

            );

            fileContent.innerText = this.result;

            console.log(formatJson);
        });

    }

    

    const submitUpload = document.querySelectorAll('#submitUpload')[0];

    submitUpload.addEventListener("click", function() {

        let inputFile = document.querySelectorAll('#importJsonFromTxt')[0].files[0];

        textFileReader(inputFile);        
    });
    
</script>



</html>
