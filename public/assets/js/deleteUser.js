
const deleteUser = document.querySelector("#deleteUser");

deleteUser.addEventListener("click", async () => {            
    
    const deleteFormData = new FormData();
    deleteFormData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );    
    deleteFormData.append( "email", document.querySelectorAll('#email')[0].value );
    deleteFormData.append( "password", document.querySelectorAll('#password')[0].value );

    console.log(deleteFormData);

    const deletedUserResponse = await fetch("/deleteUser", {
        method: "POST",
        body: deleteFormData,
    });

    console.log(await deletedUserResponse.json());

})