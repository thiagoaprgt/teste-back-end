const submit = document.querySelector("#submit");

async function productCreated() {
    document.querySelectorAll('#name')[0].value = '';
    document.querySelectorAll('#price')[0].value = '';
    document.querySelectorAll('#description')[0].value = '';
    document.querySelectorAll('#category')[0].value = '';
    document.querySelectorAll('#image_url')[0].value = '';
    
    document.querySelectorAll('#message')[0].innerHTML = 'Produto cadastrado com sucesso';
    document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

    setTimeout(() => {

        document.querySelectorAll('#message')[0].innerHTML = '';
        document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");
        
    }, 4000);

    console.log("deu certo");
}

submit.addEventListener("click", async () => {            
    
    const formData = new FormData();
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "name", document.querySelectorAll('#name')[0].value );
    formData.append( "price", document.querySelectorAll('#price')[0].value );
    formData.append( "description", document.querySelectorAll('#description')[0].value );
    formData.append( "category", document.querySelectorAll('#category')[0].value );
    formData.append( "image_url", document.querySelectorAll('#image_url')[0].value );
    

    console.log(formData);

    const response = await fetch("/createProduct", {
        method: "POST",
        body: formData,
    });    
     
    await productCreated();
  

})

