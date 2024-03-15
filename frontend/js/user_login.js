let loginForm = document.getElementById("form")
const baseUrl = 'http://localhost/Workmate/backend/'
const siteUrl = "http://localhost/workmate/frontend/"

loginForm.onsubmit = e =>{
    e.preventDefault()
    const form_data = new FormData(loginForm);
    console.log(form_data)

    fetch(`${baseUrl}userlogin`,
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
            if (data.status== 'Login sucessful') {
                let id = data.user_info.id
                let username  = data.user_info.username
                console.log(username)
                document.cookie = `user_id=${id},username=${username};path=/;samesite=none;secure`
                console.log(document.cookie)
                 window.location.replace(siteUrl)
            }else{
                alert(data.status)
            }
        }
        //store user info as cookie(if login is sucesful)
        //return user to the task page where he can CRUD tasks
    )
    .catch(error => console.log(error))
}
