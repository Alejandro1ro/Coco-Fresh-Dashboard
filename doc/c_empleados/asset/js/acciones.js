function informe(id, nombre, fecha1, fecha2, entre) {
    xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('nomina').innerHTML = this.responseText;
    };

    if (entre == 1) {
        xhttp.open(
            'GET',
            `doc/informe.php?Id=${id}&Nombre=${nombre}&fecha1=${fecha1}&fecha2=${fecha2}&Entre`,
            true
        );
    } else {
        xhttp.open('GET', `doc/informe.php?Id=${id}&Nombre=${nombre}`, true);
    }
    xhttp.send();
}
