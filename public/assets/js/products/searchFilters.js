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

    let table = makeTable(json.length);
    
    let body = document.querySelectorAll('body')[0];

    body.insertAdjacentElement('beforeend', table);

    console.log(json);

    for (let index = 0; index < json.length; index++) {
        let tr = document.querySelectorAll('tr')[index];

        tr.querySelectorAll('td')[0].innerText = json[0].id;
        tr.querySelectorAll('td')[1].innerText = json[1].name;
        tr.querySelectorAll('td')[2].innerText = json[2].price;
        tr.querySelectorAll('td')[3].innerText = json[3].description;
        tr.querySelectorAll('td')[4].innerText = json[4].category;
        tr.querySelectorAll('td')[5].innerText = json[5].image_url;
       
        
    }

    

});


function makeTable(tableRowLength) {
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
    
   
    tableBody.appendChild(tableRow[0]);;
    
    
    

    tableBody.querySelectorAll('th')[0].innerText = 'ID';

    tableBody.querySelectorAll('th')[1].innerText = 'Nome';

    tableBody.querySelectorAll('th')[2].innerText = 'Preço';

    tableBody.querySelectorAll('th')[3].innerText = 'Descrição';

    tableBody.querySelectorAll('th')[4].innerText = 'Categoria';

    tableBody.querySelectorAll('th')[5].innerText = 'URL imagem';

    tableBody.querySelectorAll('th')[6].innerText = 'Editar';

    tableBody.querySelectorAll('th')[7].innerText = 'Excluir';



       



    for (let indexTableRow = tableRow.length; indexTableRow < tableRowLength + indexTableRow; indexTableRow++) {

        tableRow.push(document.createElement('tr'));

        for (let indexTableData = 0; indexTableData < 8; indexTableData++) {
        
            tableData.push(document.createElement('td'));
            tableRow[indexTableRow].appendChild(tableData[indexTableData])
            
        }

        tableBody.appendChild(tableRow[indexTableRow]);
       
    }
    

    table.appendChild(tableBody);

    return table;
    
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


