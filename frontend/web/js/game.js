let langInp = document.querySelectorAll('.inp_de')
    transDe = document.querySelectorAll('.trans_de');

for(let i = 0; i < langInp.length; i++){
    langInp[i].oninput =  function (){
        let inpId = langInp[i].id
            val = this.value.trim();
        if(transDe[i].textContent == val){
            transDe[i].classList.remove("d-none");
            langInp[i].remove();
        } else {
            langInp[i].style.border = '1px solid red';
        }
    }
}