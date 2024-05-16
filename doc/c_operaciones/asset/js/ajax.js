function buscar() {
    let valor = document.getElementById('input').value;
    let validaValor = /^[0-9]+$/;

    //Primer Ajax

    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('buscar').innerHTML = this.responseText;
    };

    if (valor.match(validaValor)) {
        let tipo = 'numero';
        xhttp.open('GET', `asset/doc/buscar.php?valor=${valor}&tipo=${tipo}`, true);
    } else {
        let tipo = 'texto';
        xhttp.open('GET', `asset/doc/buscar.php?valor=${valor}&tipo=${tipo}`, true);
    }

    xhttp.send();

    //Segundo Ajax

    let xmlh = new XMLHttpRequest();
    xmlh.onload = function () {
        document.getElementById('validacion').innerHTML = this.responseText;
    };
    xmlh.open('GET', `asset/doc/validacion.php?valor=${valor}`, true);
    xmlh.send();
}

function pegar(nombre) {
    document.getElementById('input').value = nombre;
    let valor = document.getElementById('input').value;

    let xmlh = new XMLHttpRequest();
    xmlh.onload = function () {
        document.getElementById('validacion').innerHTML = this.responseText;
    };
    xmlh.open('GET', `asset/doc/validacion.php?valor=${valor}`, true);
    xmlh.send();
}
