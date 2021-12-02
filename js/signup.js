//script file for sign up page
document.addEventListener('DOMContentLoaded', function(){
    var uname = document.getElementsByClassName("uname")[0];
    var pwrd = document.getElementsByClassName("pwrd")[0];
    var fname = document.getElementsByClassName("fname")[0];
    var lname = document.getElementsByClassName("lname")[0];
  
   
    var btn = document.getElementById("signup-btn");
    
    var alphanum = /^[0-9a-zA-Z]+$/;
    var usr_regex = /^(?=[a-zA-Z0-9._]{6,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
    var msg = document.getElementsByClassName("message")[0];
    //window.onclick = function(e) {
       // if (e.target == modal) {
         //   modal.style.display = "none";
       // }
    //signup button
    btn.addEventListener('click', (e)=>{
        e.preventDefault();
        httpR = new XMLHttpRequest();
       //username validation
       if (uname.value === null || uname.value === ""){
           uname.classList.add("error");
           msg.innerHTML= "Username field is empty.";
       }else if (uname !== null || uname !== ""){
           if(!uname.value.match(usr_regex)){
               uname.classList.add("error");
               msg.innerHTML= "Username is invalid.";
           }else{
               uname.classList.add("no-error");
           } 
        //}else{
          //  uname.classList.add("no-error");
        }

       //password validation
       if (pwrd.value === null || pwrd.value === ""){
           pwrd.classList.add("error");
           msg.innerHTML= "Password field is empty.";
       }else if (pwrd.value !== null || pwrd.value !== ""){
            if(!pwrd.value.match(alphanum)){
                pwrd.classList.add("error");
                msg.innerHTML= "Password is invalid.";
            }else{
                pwrd.classList.add("no-error");
            } 
        }else{
            pwrd.classList.add("no-error");
        }


        //fname validation
        if (fname.value === null || fname.value === ""){
            fname.classList.add("error");
            msg.innerHTML= "First Name field is empty.";
        }else if (fname.value !== null || fname.value !== "") {
            if (isNaN(fname.value)){
                fname.classList.add("no-error");
            }else{
                fname.classList.add("error");
                msg.innerHTML= "First Name is invalid.";
            }
        }else{
            fname.classList.add("no-error");
        }

        //lname validation
        if (lname.value === null || lname.value === ""){
            lname.classList.add("error");
            msg.innerHTML= "Last Name field is empty.";
        }else if (lname.value !== null || lname.value !== "") {
            if (isNaN(lname.value)){
                lname.classList.add("no-error");
            }else{
                lname.classList.add("error");
                msg.innerHTML= "Last Name is invalid.";
            }
        }else{
            lname.classList.add("no-error");
        }

  
    

        httpR.onreadystatechange = function(){
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                var response = httpR.responseText;
                console.log(response);
                if(response.trim() == "USER SUCESSFULLY ADDED"){
                    location.assign("html/login.html");
                }
            }
        }
        httpR.open('GET', "/php/UIHandler.php?action=signup&uname="+uname.value+"&pwrd="+pwrd.value+"&fname="+fname.value+"&lname="+lname.value, true);
        httpR.send();
       //"/html/login.html")
        
    });
})
    