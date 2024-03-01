let form = document.getElementById('form')
const baseUrl = 'http://localhost/Workmate/backend/'

// let title = document.querySelector('')
// let description = document.querySelector('')
// let date = document.querySelector('')

form.onsubmit = e => {
    e.preventDefault()
    const form_data = new FormData(form);
    console.log(form_data)
    fetch(`${baseurl}createuser`,
            {method:"POST",
            // headers: {
            //     "Accept": "application/json, text/plain, "/" ",
            //     'content-type': "application/json",
            // },
            body:form_data //JSON.stringify({
                
        
        })
        .then(res => {return res.json()})
        .then(data => console.log(data))
        .catch(error => console.log(error))

}







