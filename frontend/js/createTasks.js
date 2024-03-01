let Form = document.getElementById("form")
const baseUrl = 'http://localhost/Workmate/backend/'


Form.onsubmit = e =>{
    e.preventDefault()
    const form_data = new FormData(Form);
    console.log(form_data)

    fetch(`${baseUrl}createtasks`,
        {method:"POST",
        // headers: {
        //     "Accept": "application/json, text/plain, "/" ",
        //     'content-type': "application/json",
        // },
        body:form_data
    
    })
    .then(res => {return res.json()})
    .then(data =>
        {
        //check if the user login status is sucessful
            console.log(data)
        }
        //store user info as cookie(if login is sucesful)
        //return user to the task page where he can CRUD tasks
    )
    .catch(error => console.log(error))
}