
fetch('/counterBar')
    .then(response => response.json())
    .then(data => {
        $(document).ready(function () {

            let number = document.getElementById("number")
            let counter = 0
            setInterval(() => {
                if (counter == data.tr) {
                    clearInterval()
                } else {
                    counter += 1
                    number.innerHTML = counter + "%"
                }

            }, 20)

        })
    })

