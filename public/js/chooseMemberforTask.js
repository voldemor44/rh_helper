
// for search
document.getElementById('my-search-input').addEventListener('input', function () {
    console.log('search')
    searchOfEmployee(this.value);
});

function searchOfEmployee(keyword) {
    let employees = document.getElementsByClassName('my-employee');

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

// for select
let mytableMember = []

const mydivsEmployes = document.querySelectorAll('.my-contain-member')
const mydivProject = document.getElementById('my-div-id')
const myprojectId = mydivProject.dataset.id

mydivsEmployes.forEach((divEmploye) => {
    let s = false
    let counter = 0
    divEmploye.addEventListener('click', function (event) {

        if (!s) {
            const nomEmploye = this.dataset.nom;
            this.style.background = "#ff9b44"
            this.querySelector('.div-name').querySelector('.user-name').style.color = "white"
            mytableMember.push(nomEmploye)
            console.log(mytableMember);
            s = true
        } else {
            this.style.background = "transparent"
            this.querySelector('.div-name').querySelector('.user-name').style.color = "#333333"
            let member = mytableMember.indexOf(this.dataset.nom)
            if (mytableMember.length === 1) {
                mytableMember.pop()
            } else {
                mytableMember = mytableMember.slice(0, member).concat(mytableMember.slice(member + 1));
            }

            s = false
            console.log(mytableMember);
        }

    });
});


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
})


function submitnewMembers() {
    $.ajax({
        url: "/add-other-members/" + mytableMember + "/project/" + myprojectId,

        method: "POST",
        success: function () {

            $(document).ready(function () {
                $('#addMemberMessage').modal('show')
                $('.add-member-message').text('Ajout de membres réussi')
            })
            location.reload()

        },

        error: function (xhr, status, error) {
            // Gérez les erreurs ici
        }


    })
}
