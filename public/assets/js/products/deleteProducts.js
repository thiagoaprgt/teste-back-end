
const deleteUser = document.querySelector("#deleteUser");

deleteUser.addEventListener("click", async () => {            
    
    const deleteFormData = new FormData();
    deleteFormData.append( "_token", document.querySelectorAll('#laravelSecurityToken')[0].value );    
    deleteFormData.append( "id", document.querySelectorAll('#id')[0].value );    

    console.log(deleteFormData);

    const deletedUserResponse = await fetch("/deleteUser", {
        method: "POST",
        body: deleteFormData,
    });

    console.log(await deletedUserResponse.json());

})