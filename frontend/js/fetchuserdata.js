let form = document.getElementById('form')
const baseUrl = 'http://localhost/Workmate/backend/'

// let title = document.querySelector('')
// let description = document.querySelector('')
// let date = document.querySelector('')
let decoder = decodeURIComponent(document.cookie)
let x = decoder.split(';')
let url = x[0].split('=')
let user_id = url[1]


fetch(`${baseurl}findtask?id=${user_id}`,
            {method:"   GET",
        })
        .then(res => {return res.json()})
        .then(data => console.log(data))
        .catch(error => console.log(error))




form.onsubmit = e => {
    e.preventDefault()
    fetch(`${baseurl}findtask?id=${user_id}`,
            {method:"   GET",
        })
        .then(res => {return res.json()})
        .then(data => console.log(data))
        .catch(error => console.log(error))

}