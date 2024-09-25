const submit = document.querySelector("#submit");

submit.addEventListener("click", async () => {            
    
    const formData = new FormData();
    formData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );
    formData.append( "name", document.querySelectorAll('#name')[0].value );
    formData.append( "email", document.querySelectorAll('#email')[0].value );
    formData.append( "password", document.querySelectorAll('#password')[0].value );

    console.log(formData);

    const response = await fetch("/createUser", {
        method: "POST",
        body: formData,
    });

    console.log(await response.json());

})

