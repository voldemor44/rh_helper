
// For Project

document.getElementById('search-input').addEventListener('input', function () {
    console.log('search')
    searchEmployee(this.value);
});

function searchEmployee(keyword) {
    let employees = document.getElementsByClassName('employee');

    for (let i = 0; i < employees.length; i++) {
        let employee = employees[i];
        let employeeName = employee.getElementsByClassName('user-name')[0].textContent;

        if (employeeName.toLowerCase().includes(keyword.toLowerCase())) {
            employee.style.display = 'block';
        } else {
            employee.style.display = 'none';
        }
    }



}


let tableMember = []

const divsEmployes = document.querySelectorAll('.contain-member');

divsEmployes.forEach((divEmploye) => {
    let s = false
    divEmploye.addEventListener('click', function (event) {

        if (!s) {
            const nomEmploye = this.dataset.nom;
            this.style.background = "#ff9b44"
            this.querySelector('.div-name').querySelector('.user-name').style.color = "white"
            tableMember.push(nomEmploye)
            console.log(tableMember);
            s = true
        } else {
            this.style.background = "transparent"
            this.querySelector('.div-name').querySelector('.user-name').style.color = "#333333"
            let member = tableMember.indexOf(this.dataset.nom)
            if (tableMember.length === 1) {
                tableMember.pop()
            } else {
                tableMember = tableMember.slice(0, member).concat(tableMember.slice(member + 1));
            }

            s = false
            console.log(tableMember);
        }

    });
});

let divData = document.getElementById('div-members')
let inputData = divData.dataset.valuesInputs

console.log(inputData)

function submitMembers() {

    console.log(tableMember)

    $.ajax({
        url: "/process-create/" + tableMember + "/values/" + inputData,

        method: "GET",
        success: function (response) {
            // Insérez le contenu du formulaire dans la boîte de dialogue modale
            $('#process_create_project .modal-body').html(response);

            // Ouvrez la boîte de dialogue modale
            $('#process_create_project').modal('show');

            console.log('process-create')

        },

        error: function (xhr, status, error) {
            // Gérez les erreurs ici
        }


    })
}


// End For project



