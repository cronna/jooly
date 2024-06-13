
const createUl = document.querySelector(".create-ul"),
      createBtn = document.querySelector(".create-button"),
      a = document.querySelector(".create-li"),
      a2 = document.querySelector(".create-li2")

let i = 0


createBtn.addEventListener('click', () => {
    
    if(i % 2 == 0){
        createUl.style.width = '200px'
        createUl.style.height = '100px'
        createBtn.style.marginLeft = '160px'
        createUl.style.background = 'rgb(240, 240, 240)'
        a.style.color = 'black'
        a2.style.color = 'black'
    }else{
        createUl.style.height = '0.1px' 
        createUl.style.background = 'white'
        a.style.color = 'white'
        a2.style.color = 'white'
    }
    i++
})
