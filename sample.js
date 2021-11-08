let datas = ['01A', '0BA' , '02B']
let warning = [];
for(let data of datas){
    console.info(data)
    for(let x = 0; x < 2; x++){
        if(isNaN(data[x])){
            console.error('Not Number')
            warning.push(data)
        }else{
            console.info('A Number')
        }
    }
}

console.error(warning)