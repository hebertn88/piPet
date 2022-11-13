const rowsTable = document.querySelectorAll('table tbody tr');

//console.log(rowsTable);
rowsTable.forEach(function(row){
    const buttons = row.querySelector('.actionGroup');
    const btnExcluir = buttons.getElementsByClassName('btn-excluir')[0];
    const url = btnExcluir.href;

    btnExcluir.addEventListener('click', function(event){
        event.preventDefault();
        if (window.confirm('Tem certeza que quer excluir este item?')) {
            window.location.assign(url);
        }
    })
})