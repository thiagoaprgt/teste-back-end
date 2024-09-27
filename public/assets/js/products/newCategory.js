const submit = document.querySelector("#submit");

async function productCreated() {
   
    document.querySelectorAll('#category')[0].value = '';
    
    document.querySelectorAll('#message')[0].innerHTML = 'Categoria cadastrada com sucesso';
    document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

    setTimeout(() => {

        document.querySelectorAll('#message')[0].innerHTML = '';
        document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");
        
        
    }, 4000);

   
}

submit.addEventListener("click", async () => {            
    
    const formData = new FormData();
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "category", document.querySelectorAll('#category')[0].value );

    console.log(formData);

    const response = await fetch("/createCategory", {
        method: "POST",
        body: formData,
    });    
     
    await productCreated();
  

})

