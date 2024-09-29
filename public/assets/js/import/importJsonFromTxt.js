      
    async function importJson(json) {

        const form = new FormData();
        form.append('_token', document.querySelectorAll('#laravelSecurityToken')[0].getAttribute('value'));
        form.append('json', json);

        const response = await fetch("/importProducts", {
            method: "POST",
            body: form,
        });       

        await setTimeout(() => {

            window.location.replace("../productsTemplate/getAllProducts");
            
        }, 1000);

    }


function textFileReader(HtmlElementFromInputTextFile) {

    let reader = new FileReader();

    reader.readAsText(HtmlElementFromInputTextFile);    
    
    reader.addEventListener('load', function() {   

        let formatJson = JSON.parse(this.result);

        formatJson = JSON.stringify(formatJson);

        importJson(formatJson);       

        console.log(formatJson);

    });

}



const submitUpload = document.querySelectorAll('#submitUpload')[0];

submitUpload.addEventListener("click", function() {

    let inputFile = document.querySelectorAll('#importJsonFromTxt')[0].files[0];

    textFileReader(inputFile);        
});