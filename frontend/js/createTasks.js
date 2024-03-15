let Form = document.getElementById("form")
let statbar = document.querySelector(".status")
const baseUrl = 'http://localhost/Workmate/backend/'



Form.onsubmit = e =>{
    e.preventDefault()
    let decoder = decodeURIComponent(document.cookie)
    
let x = decoder.split(',')
let url = x[0].split('=')
let user_id = url[1]

    let title = document.querySelector('#title')
    let description = document.querySelector('#description')
    let type = document.querySelector('#type')
    let date = document.querySelector('#date')
    let typeEnum = {
        'group':1,
        'single':2
    }
     let form_data = new FormData()
     form_data.append('title', title.value)
     form_data.append('description', description.value)
     form_data.append('type', typeEnum[type.value])
     form_data.append('status', 2)
     form_data.append('due_date',date.value)
     form_data.append('creator',user_id)


    fetch(`${baseUrl}createtask`,
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
            console.log(data)
            //fill in your in your title and description
            if (data['status'] == 'Fill-in your title and description') {
                
                Swal.fire({
                    position: "top",
                    icon: "warning",
                    title: data['status'],
                    showConfirmButton: true
                  }).then((cl)=> {if(cl.isConfirmed) title.focus()} );
                  
            }else{
                Swal.fire({
                    position: "top",
                    icon: "success",
                    title: data['status'],
                    showConfirmButton: false,
                    timer: 2000
                  });
            }
        }
    )
    .catch(error => console.log(error))
}