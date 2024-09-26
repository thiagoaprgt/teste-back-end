async function productUpdated() {    
            
    document.querySelectorAll('#message')[0].innerHTML = 'Produto cadastrado com sucesso';
    document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

    setTimeout(() => {

        document.querySelectorAll('#message')[0].innerHTML = '';
        document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");
        
    }, 5000);
    
}

const submit = document.querySelector("#submit");

submit.addEventListener("click", async () => {            
    
    const formData = new FormData();    
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "category", document.querySelectorAll('#selectcategories')[0].value );     
    

    console.log(formData);

    const response = await fetch("/deleteCategory", {
        method: "POST",
        body: formData,
    });

    

    await productUpdated();

})