const searchFilterSubmit = document.querySelectorAll('#searchFilterSubmit')[0];

searchFilterSubmit.addEventListener('click', async () => {

    let searchFilterFormData = new FormData();
    searchFilterFormData.append('_token', document.querySelectorAll('#laravelSecurityToken')[0].value);
    searchFilterFormData.append('id', document.querySelectorAll('#filter_id')[0].value);
    searchFilterFormData.append('name', document.querySelectorAll('#filter_name')[0].value);
    searchFilterFormData.append('category', document.querySelectorAll('#filter_category')[0].value);
    searchFilterFormData.append('image_url', document.querySelectorAll('#filter_image_url')[0].value);

    let searhFiltersLoading = document.querySelectorAll('#searhFiltersLoading')[0];
    searhFiltersLoading.classList.toggle('invisible');
   
    document.querySelectorAll('table')[0].remove();
    

    let response = await fetch('/searchFilters', {
        method: 'POST',
        body: searchFilterFormData
    });

    const json = await response.json();
    console.log(json.length);
    console.log(json[0]);

    let table = await makeTable(json.length);
    
    let body = document.querySelectorAll('body')[0];

    body.insertAdjacentElement('beforeend', table);
    

    for (let index = 0; index < json.length; index++) {
        let tr = document.querySelectorAll('.informationRowTable')[index];

        tr.querySelectorAll('td')[0].innerText = json[index].id;
        tr.querySelectorAll('td')[1].innerText = json[index].name;
        tr.querySelectorAll('td')[2].innerText = json[index].price;
        tr.querySelectorAll('td')[3].innerText = json[index].description;
        tr.querySelectorAll('td')[4].innerText = json[index].category;
        tr.querySelectorAll('td')[5].innerText = json[index].image_url;  
        
        let link = document.createElement('a');
        link.setAttribute('href', '/getProdcutById/' + json[index].id);
        tr.querySelectorAll('td')[6].appendChild(link);
        tr.querySelectorAll('td')[6].querySelectorAll('a')[0].innerHTML = '&#x270F;&#xFE0F;';


        let button = document.createElement('button');
        button.setAttribute('onclick', 'deleteProduct(' + json[index].id + ')');
        tr.querySelectorAll('td')[7].appendChild(button);
        tr.querySelectorAll('td')[7].querySelectorAll('button')[0].innerHTML = '&#x1F5D1;&#xFE0F;';

       
        
    }

    searhFiltersLoading.classList.toggle('invisible');

});


function makeTableHead() {
    let table = document.createElement('table');
    table.setAttribute('class', 'table table-striped');

    let tableBody = document.createElement('tbody');
    
    let tableRow = [];
    let tableHead = [];
    let tableData = [];     

    tableRow.push(document.createElement('tr'));
    
    for (let index = 0; index < 8; index++) {
        tableHead[index] = document.createElement('th');   
        tableRow[0].appendChild(tableHead[index]);     
    } 
    
   
    tableBody.appendChild(tableRow[0]);   
    

    tableBody.querySelectorAll('th')[0].innerText = 'ID';

    tableBody.querySelectorAll('th')[1].innerText = 'Nome';

    tableBody.querySelectorAll('th')[2].innerText = 'Preço';

    tableBody.querySelectorAll('th')[3].innerText = 'Descrição';

    tableBody.querySelectorAll('th')[4].innerText = 'Categoria';

    tableBody.querySelectorAll('th')[5].innerText = 'URL imagem';

    tableBody.querySelectorAll('th')[6].innerText = 'Editar';

    tableBody.querySelectorAll('th')[7].innerText = 'Excluir';


    table.appendChild(tableBody);    

    return table;  

} 


function makeTableData(table, tableRowLength) {  

    let tableRows = [];
    
    let tableBody = table.querySelectorAll('tbody')[0];
    

    for (let indexTableRows = 0; indexTableRows < tableRowLength; indexTableRows++) {  


        tableRows.push(document.createElement('tr'))
        tableRows[indexTableRows].setAttribute('class', 'informationRowTable');

        for (let indexTableData = 0; indexTableData < 8; indexTableData++) {
                       
            let tableData = document.createElement('td');            
           
            tableRows[indexTableRows].appendChild(tableData);                         
            
        } 

        tableBody.appendChild(tableRows[indexTableRows]);

        
    }
    
    return table;   

    
}

async function makeTable(numberOfRows) {

    return makeTableData(makeTableHead(), numberOfRows);

}

function resetFilters() {

    document.querySelectorAll("#filter_id")[0].value = "";
    document.querySelectorAll("#filter_name")[0].value = "";
    document.querySelectorAll("#filter_category")[0].value = "allCategories";
    document.querySelectorAll("#filter_image_url")[0].value = "";

}



function getTable() {
    let response = fetch('assets/html/productsTableRows.html')
    .then((res) => {
        res.blob()
    })
    .then((data) => {
        const objectURL = URL.createObjectURL(data);
        console.log(objectURL);
        
    })
}


