myform.addEventListener('submit', async(e) => {
    e.preventDefault()
    table_body.innerHTML = ''
    let incomingData = myform.name.value

    if(!incomingData){
        Swal.fire(
            'Something went wrong',
            'Please enter some jeepney name',
            'error'
        )
        return
    }

    incomingData = separateStringByComma(incomingData)
    incomingData = removeSpacesInEachData(incomingData)
    let errors = checkIf2DigitsIsNumberic(incomingData)

    if(errors.length > 0){
        Swal.fire(
            'Invalid Jeepney(s) code',
            `Code: ${errors}`,
            'error'
        )
        return
    }

    let url =  './Backend/Controller/request.php'
    let response = await fetch(url,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(incomingData)
    })

    response = await response.json()

    if(response.data.length > 0){
        addDataToTable(response.data, 'success')
    }

    if(response.invalids.length > 0){
        addDataToTable(response.invalids,'error')
    }

    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {backdrop: true})
    myModal.show()
})

function separateStringByComma(value){
    return value.split(",");
}

function removeSpacesInEachData(value){
    let newValue =[]
    for(let data of value){
        newValue.push(data.trim())
    }
    return newValue
}

function checkIf2DigitsIsNumberic(values){
    let errors = []
    for(let value of values){
        let count = 0
        for(let x = 0 ;x < 2; x++){
            if(isNaN(value[x])){
                count++
            }
        }

        if(count > 0){
            errors.push(value)
        }
    }
    return errors;
}

function addDataToTable(value, status)
{
    let tableDatas = ''

    for(let count = 0 ; count < value.length; count++){
        if(status == 'success'){
            let key = Object.keys(value[count])
            tableDatas += `<tr> <td> ${key[count]} </td> <td> ${value[count][key[count]]} </td> </tr>`
        }else{
            tableDatas += `<tr class='table-danger'> <td> ${value[count]}</td> <td> Invalid Jeepney Code </td> </tr>`
        }
    }
    table_body.innerHTML += tableDatas
}


function checkIfRoutesAreTheSame(){

}
