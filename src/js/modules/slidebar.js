let ope = true;
let operaciones = function () {
    if (ope == true) {
        document.querySelectorAll('#report_ope')[0].style.marginTop = '0';
        document.querySelectorAll('#report_ope')[1].style.marginTop = '0';
        if (emp == false) {
            document.querySelectorAll('#report_emp')[0].style.marginTop = '-42.08px';
            document.querySelectorAll('#report_emp')[1].style.marginTop = '-42.08px';
            emp = true;
        }
        ope = false;
    } else if (ope == false) {
        document.querySelectorAll('#report_ope')[0].style.marginTop = '-42.08px';
        document.querySelectorAll('#report_ope')[1].style.marginTop = '-42.08px';
        ope = true;
    }
};
let boton_ope = document.getElementById('operaciones');
boton_ope.addEventListener('click', operaciones);

let emp = true;
let empleados = function () {
    if (emp == true) {
        document.querySelectorAll('#report_emp')[0].style.marginTop = '0';
        document.querySelectorAll('#report_emp')[1].style.marginTop = '0';
        if (ope == false) {
            document.querySelectorAll('#report_ope')[0].style.marginTop = '-42.08px';
            document.querySelectorAll('#report_ope')[1].style.marginTop = '-42.08px';
            ope = true;
        }
        emp = false;
    } else if (emp == false) {
        document.querySelectorAll('#report_emp')[0].style.marginTop = '-42.08px';
        document.querySelectorAll('#report_emp')[1].style.marginTop = '-42.08px';
        emp = true;
    }
};
let boton_emp = document.getElementById('empleados');
boton_emp.addEventListener('click', empleados);
