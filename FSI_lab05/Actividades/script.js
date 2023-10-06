const buttons = document.querySelectorAll(".button")
const text = document.getElementById("text")
const remove = document.getElementById("remove")
const clear = document.getElementById("clear")
const result = document.getElementById("result")

buttons.forEach(button =>{
    button.addEventListener("click",_=>{
        text.value += button.value
    })
})

remove.addEventListener("click",_=>{
    text.value = text.value.slice(0,-1)
})

clear.addEventListener("click",_=>{
    text.value = ""
})

result.addEventListener("click",_=>{
    try {
        text.value = eval(text.value)
    } catch (error) {
        text.value = ""   
        alert("Error")     
    }
})