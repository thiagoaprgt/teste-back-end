const submitAddCategory = document.querySelector("#submitAddCategory");
const submitDeleteCategory = document.querySelector("#submitDeleteCategory");


async function categoryDeleted() {  
    
    document.querySelectorAll('#message')[0].innerHTML = 'Categoria Deletada com sucesso';
    document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

    setTimeout(() => {

        document.querySelectorAll('#message')[0].innerHTML = '';
        document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

        window.location.reload();
        
    }, 4000);

    
}



async function productDeleted() {  
    
    document.querySelectorAll('#message')[0].innerHTML = 'Produto deletado com sucesso';
    document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

    setTimeout(() => {

        document.querySelectorAll('#message')[0].innerHTML = '';
        document.querySelectorAll('#message')[0].classList.toggle("visually-hidden");

        window.location.reload();
        
    }, 4000);

    
}




submitDeleteCategory.addEventListener("click", async () => {            
    
    const formData = new FormData();
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "category", document.querySelectorAll('#selectcategories')[0].value );
    

    console.log(formData);

    const response = await fetch("/deleteCategory", {
        method: "POST",
        body: formData,
    });    
     
    await categoryDeleted();
  

});

async function deleteProduct(id) {    
    
    const formData = new FormData();
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append("id", id);
    

    console.log(formData);

    const response = await fetch("/deleteProduct", {
        method: "POST",
        body: formData,
    });    
     
    await productDeleted();
}

