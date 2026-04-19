
// For Project
console.log('ForCOM Js')
// Pour la recherche d'un membre
document.getElementById('search-input-div').addEventListener('input', function () {
    console.log('search of forChooseOneMember')
    searchEmployee(this.value);
})

console.log('test ok')

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


// Pour la selection du membre

let tableMember = []

const divsEmployes = document.querySelectorAll('.contain-member');

divsEmployes.forEach((divEmploye) => {
    let s = false
    let counter = 0
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

let divData2 = document.getElementById('forproject')
let dataProject = divData2.dataset.projectId

console.log(inputData)

function submitMember() {

    console.log(tableMember)

    $.ajax({
        url: "/task-assign/" + tableMember + "/values/" + inputData + "/project/" + dataProject,

        method: "GET",
        success: function (response) {
            // Insérez le contenu du formulaire dans la boîte de dialogue modale
            $('#process_task_assign .modal-body').html(response);

            // Ouvrez la boîte de dialogue modale
            $('#process_task_assign').modal('show');

            console.log('task_assign')

        },

        error: function (xhr, status, error) {
            // Gérez les erreurs ici
        }


    })
}


// End For project



