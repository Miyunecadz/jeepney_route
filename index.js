myform.addEventListener('submit', (e) => {
    e.preventDefault()
    let incomingData = myform.name.value

    if(!incomingData){
        Swal.fire(
            'Something went wrong',
            'Please enter some jeepney name',
            'error'
        )
    }else{

    }
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

function checkIf2IsNumberic(values){
    let errors = [];
    for(let value of values){
        for(let x = 0 ;x < 2; x++){
            if(isNaN(value[x])){
                errors.push(value)
            }
        }
    }

    if(errors.length > 0){
        Swal.fire(
            'Invalid Jeepney Code',
            `Invalid codes: ${errors}`,
            'error'
        )
    }
}