      
    async function importJson(jsonContenString) {

        const form = new FormData();
        form.append('_token', document.querySelectorAll('#laravelSecurityToken')[0].getAttribute('value'));
        form.append('json', jsonContenString);

        const response = await fetch("/importProducts", {
            method: "POST",
            body: form,
        });       

        await setTimeout(() => {

            window.location.reload();
            
        }, 3000);

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

        console.log(formatJson);

    });

}



const submitUpload = document.querySelectorAll('#submitUpload')[0];

submitUpload.addEventListener("click", function() {

    let inputFile = document.querySelectorAll('#importJsonFromTxt')[0].files[0];

    textFileReader(inputFile);        
});