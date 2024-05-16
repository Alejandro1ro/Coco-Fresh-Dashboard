function editar(footer, id) {
    Swal.fire({
        title: 'Editar',
        input: 'text',
        inputPlaceholder: 'Insetar valor deseado',
        inputRequired: true,
        inputAttributes: {Required:''},
        confirmButtonText: 'Guardar',
        preConfirm: (editado) => {
            (function ajax() {
                xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    document.getElementById('body_table').innerHTML = this.responseText;
                };
                xhttp.open('GET', `asset/doc/edit_config.php?valor=${editado}&id=${id}`, true);
                xhttp.send();
            }())
        },
        backdrop: `
          rgba(0,0,123,0.4)
        `,
        footer: `${footer.toUpperCase()}`
    });
}
