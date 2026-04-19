//For contracts

document.getElementById('search-input').addEventListener('input', function () {
    console.log('search')
    searchEmployee(this.value);
});


function searchEmployee(keyword) {
    let employees = document.getElementsByClassName('employee');
    let userData = [];

    for (let i = 0; i < employees.length; i++) {
        let employee = employees[i];
        let employeeId = employee.getElementsByClassName('user-name')[0].textContent;

        if (employeeId.toLowerCase().includes(keyword.toLowerCase())) {
            employee.style.display = 'block';
            userData.push(employeeId);
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
            s = true;
            fetch('/contratCDD', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ employeeId: nomEmploye }),
            })
            .then(response => response.json())
            .then(data => {
                // Faites quelque chose avec les données renvoyées par Laravel
                console.log(data);
            })
            .catch(error => {
                // Gérer les erreurs de la requête
                console.error('Erreur lors de la requête AJAX :', error);
            });
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



    // Envoyer la requête AJAX à Laravel

    // document.getElementById('submit-member').addEventListener('click', function() {

    //     console.log(tableMember);
    //     if (tableMember.length > 0) {
    //         let id = tableMember[0]; // Récupérer le premier nom d'utilisateur (vous pouvez ajuster la logique selon vos besoins)

    //         fetch('/contratCDD', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //             },
    //             body: JSON.stringify({ employeeId: id }),
    //         })
    //             .then(response => response.json())
    //             .then(data => {
    //                 // Faites quelque chose avec les données renvoyées par Laravel
    //                 console.log(data);
    //             })
    //             .catch(error => {
    //                 // Gérer les erreurs de la requête
    //                 console.error('Erreur lors de la requête AJAX :', error);
    //             });

    //     }
    // });



//End For contracts
