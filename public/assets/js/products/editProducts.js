const submit = document.querySelector("#submit");

submit.addEventListener("click", async () => {            
    
    const formData = new FormData();    
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "name", document.querySelectorAll('#name')[0].value );
    formData.append( "price", document.querySelectorAll('#price')[0].value );
    formData.append( "description", document.querySelectorAll('#description')[0].value );
    formData.append( "category", document.querySelectorAll('#category')[0].value );
    formData.append( "image_url", document.querySelectorAll('#image_url')[0].value );
    

    console.log(formData);

    const response = await fetch("/editProduct", {
        method: "POST",
        body: formData,
    });

    console.log(await response.json());

})

