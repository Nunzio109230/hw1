function validazione(event){
    if(form.username.value.length==0 || form.password.value.length==0)
    {   
        event.preventDefault();
        const div=document.querySelector(".credenzialiOff");
        div.classList.add("credenzialiOn");
        const input=document.querySelectorAll("input");
        if(form.username.value.length==0)
        form.username.style.border="2px solid #cc0000";
        if(form.password.value.length==0)
        form.password.style.border="2px solid #cc0000";
    }
    
}

const form= document.forms["login_form"];
form.addEventListener("submit", validazione);