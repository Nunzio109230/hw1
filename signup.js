function OnResponse(response){
    return response.json();
}

function OnJson(json){
    let exist=false;
    for(let i=0;i<json.length;i++){
        if(json[i].username===(username_inp.value))
            exist=true;
            
        if(exist){
            document.querySelector(".warn_usernameOff").classList.add("warn_usernameOn");
            const warn_img_username=document.querySelector(".warn_usernameOn");
            warn_img_username.addEventListener("mouseover",username_existOn);
            warn_img_username.addEventListener("mouseout",username_existOff);
            username_inp.style.border="2px solid #cc0000";
        }else{
            username_inp.style.border="2px solid rgb(82, 56, 195)";
            document.querySelector(".warn_usernameOff").classList.remove("warn_usernameOn");
        }
    }
}
function username_existOn(){
    document.querySelector(".usernameOff").classList.add("usernameOn");
}
function username_existOff(){
    document.querySelector(".usernameOff").classList.remove("usernameOn");
}
function controllousername(){
    if(username_inp.value.length!==0){
        fetch("username_db_get.php")
        .then(OnResponse)
        .then(OnJson);
    }
}

function OnJsonemail(json){
    let exist=false;
    for(let i=0;i<json.length;i++){
        if(json[i].email===(email_inp.value))
            exist=true;
        
        if(exist){
            document.querySelector(".warn_emailOff").classList.add("warn_emailOn");
            const warn_img_email=document.querySelector(".warn_emailOn");
            warn_img_email.addEventListener("mouseover",email_existOn);
            warn_img_email.addEventListener("mouseout",email_existOff);
            email_inp.style.border="2px solid #cc0000";
        }else{
            email_inp.style.border="2px solid rgb(82, 56, 195)";
            document.querySelector(".warn_emailOff").classList.remove("warn_emailOn");
        }
    }
}

function email_existOn(){
    document.querySelector(".emailOff").classList.add("emailOn");
}
function email_existOff(){
    document.querySelector(".emailOff").classList.remove("emailOn");
}

function controlloemail(){
    if(email_inp.value.length!==0){
        fetch("http://localhost/hw1/username_db_get.php")
        .then(OnResponse)
        .then(OnJsonemail);
    }
}
function passw_existOn(){
    document.querySelector(".passwOff").classList.add("passwOn");
}
function passw_existOff(){
    document.querySelector(".passwOff").classList.remove("passwOn");
}
function controllopass(){
    if(pass_inp.value.length<8){
        document.querySelector(".warn_passOff").classList.add("warn_passOn");
        const warn_img_pass=document.querySelector(".warn_passOn");
        warn_img_pass.addEventListener("mouseover",passw_existOn);
        warn_img_pass.addEventListener("mouseout",passw_existOff);
        pass_inp.style.border="2px solid #cc0000";
        }else{
            const passw=pass_inp.value;
            const special_char=['!', '"', '?' ,'$', '?', '%', '^', '&' ,'*','(',')' ,'_' ,'-', '+' ,'=' ,'{' ,'[','}' ,']' ,':' ,';' ,'@' ,"'", '~' ,'#' ,'|' ,' \ ','<',',' ,'>' ,'.' ,'?' ,'/'];
            const maiu=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            const minu=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i','j','k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w','x','y','z'];
            let char_minu=false;
            let char_maius=false;
            for(let i=0;i<passw.length;i++){
                for(let j=0;j<maiu.length;j++){
                        if(passw[i].includes(maiu[j])){
                            char_maius=true;
                        }
                        if(passw[i].includes(minu[j])){
                            char_minu=true;
                        }
                        if(char_minu===true && char_maius===true )break;
                }}
                if(char_maius!==true || char_minu!==true){
                    document.querySelector(".warn_passOff").classList.add("warn_passOn");
                    const warn_img_pass=document.querySelector(".warn_passOn");
                    warn_img_pass.addEventListener("mouseover",passw_existOn);
                    warn_img_pass.addEventListener("mouseout",passw_existOff);
                    pass_inp.style.border="2px solid #cc0000";
                }else if(char_maius===true && char_minu===true){
                 let check=false;
                for(char of passw){
                    for(let i=0;i<special_char.length;i++)
                        if(char===special_char[i]){
                        check=true;
                        break;
                    };
                }
                if(!check){
                    document.querySelector(".warn_passOff").classList.add("warn_passOn");
                    const warn_img_pass=document.querySelector(".warn_passOn");
                    warn_img_pass.addEventListener("mouseover",passw_existOn);
                    warn_img_pass.addEventListener("mouseout",passw_existOff);
                    pass_inp.style.border="2px solid #cc0000";
                }else{
                    pass_inp.style.border="2px solid rgb(82, 56, 195)";
                    document.querySelector(".warn_passOff").classList.remove("warn_passOn");
                }
            }
        }
    }

    function confirm_passw_existOn(){
        document.querySelector(".confirm_passwOff").classList.add("confirm_passwOn");
    }
    function confirm_passw_existOff(){
        document.querySelector(".confirm_passwOff").classList.remove("confirm_passwOn");
    }

    function controlloconfirmpass(){
    if(confirm_pass.value!==(document.querySelector("#newpass").value)){
        document.querySelector(".warn_confirm_passOff").classList.add("warn_confirm_passOn");
        const warn_img_confirm_pass=document.querySelector(".warn_confirm_passOn");
        warn_img_confirm_pass.addEventListener("mouseover",confirm_passw_existOn);
        warn_img_confirm_pass.addEventListener("mouseout",confirm_passw_existOff);
        confirm_pass.style.border="2px solid #cc0000";
    }else{
        confirm_pass.style.border="2px solid rgb(82, 56, 195)";
        document.querySelector(".warn_confirm_passOff").classList.remove("warn_confirm_passOn");
    }
}

function controlloanno(){
    const CurrentYear=new Date().getFullYear();
    if((CurrentYear-anno_inp.value)<14){
        document.querySelector(".dateOff").classList.add("dateOn");
    }else{
        document.querySelector(".dateOff").classList.remove("dateOn");
    }
}

const pass_inp=document.querySelector("#newpass");
pass_inp.addEventListener("blur",controllopass);
const confirm_pass=document.querySelector("#confirm_newpass");
confirm_pass.addEventListener("blur",controlloconfirmpass);
const username_inp=document.querySelector('#us_name');
username_inp.addEventListener("blur",controllousername);
const email_inp=document.querySelector("#email");
email_inp.addEventListener("blur", controlloemail)
const anno_inp=document.querySelector("#yy");
anno_inp.addEventListener("blur", controlloanno);
