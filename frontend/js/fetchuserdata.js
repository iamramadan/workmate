let taskform = document.getElementById('form')
let main = document.querySelector('.mainsection')
const Url = 'http://localhost/Workmate/backend/'

// let title = document.querySelector('')
// let description = document.querySelector('')
// let date = document.querySelector('')
let Decoder = decodeURIComponent(document.cookie)
let fetchid = Decoder.split(',')
let url = fetchid[0].split('=')
let id = url[1]
console.log(id)

fetch(`${Url}?id=${id}`,
            {method:"GET",
        })
        .then(res => {return res.json()})
        .then(data => {console.log(data)
            data.array.forEach(element => {
                `<div>
                    <p>${element.title}</p>
                    <p>${element.description}</p>
                    <p>${element.Task_status}</p>
                    <p class='btn'>${element.due_date}</p>
                </div>`
            });
        }).catch(error => console.log(error))




taskform.onsubmit = e => {
    e.preventDefault()
    fetch(`${Url}?id=${id}`,
            {method:"GET",
        })
        .then(res => {return res.json()})
        .then(data => console.log(data))
        .catch(error => console.log(error))
}
