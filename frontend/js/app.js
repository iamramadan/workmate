let form = document.getElementById('form')
const baseUrl = 'http://localhost/Workmate/backend/'

// let title = document.querySelector('')
// let description = document.querySelector('')
// let date = document.querySelector('')

form.onsubmit = e => {
    e.preventDefault()
    const form_data = new FormData(form);
    console.log(form_data)
    fetch(`${baseUrl}createuser`,
            {method:"POST",
            // headers: {
            //     "Accept": "application/json, text/plain, "/" ",
            //     'content-type': "application/json",
            // },
            body:form_data //JSON.stringify({
                
        
        })
        .then(res => {return res.json()})
        .then(data => {console.log(data)
        let id = data.id
        let usr = data.username
        document.cookie = `user_id=${id},username=${usr};path=/`
                window.location.replace('http://localhost/workmate/frontend/')
        })
        .catch(error => {console.log(error),
                 alert('username already taken')})

}







