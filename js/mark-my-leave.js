(function () {
    'use strict'
    const forms = document.querySelectorAll('.requires-validation')
    Array.from(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

function getTodayDate(addDays, addMonth) {
    let today = new Date();
    let dd = String(today.getDate() + parseInt(addDays)).padStart(2, '0');
    let mm = String(today.getMonth() + 1 + parseInt(addMonth)).padStart(2, '0');
    let yyyy = today.getFullYear();

    return `${yyyy}-${mm}-${dd}`;
}

function setThisData() {
    const startdate = document.getElementById("startdate");
    startdate.setAttribute("min", getTodayDate(0, 0));
    startdate.setAttribute("max", getTodayDate(1, 0));
    startdate.setAttribute("value", getTodayDate(0, 0));

    const enddate = document.getElementById("enddate");
    enddate.setAttribute("min", getTodayDate(0, 0));
    enddate.setAttribute("max", getTodayDate(0, 1));
    enddate.setAttribute("value", getTodayDate(1, 0));
}

function changeClass() {
    const btn = document.getElementById("submit");
    btn.setAttribute("class", "btn btn-danger");
}

finalEndDate = String(document.getElementById("enddate").value);