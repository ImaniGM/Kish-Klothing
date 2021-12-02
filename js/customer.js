
//script file for the login page
document.addEventListener('DOMContentLoaded', function(){
    window.history.forward();

    var cusname = document.getElementById("cusname");
    var contNum = document.getElementById("num");
    var measure = document.getElementById("measure");
    var btn = document.getElementById("submitbutton");
    var msg = document.getElementsByClassName("txt_field");
    var msg2 = document.getElementsByClassName("txt_field2");
    var usr_regex = /^(?=[a-zA-Z0-9._]{6,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
    var count = 0;

    //login button
    btn.addEventListener('click', (e)=>{
        e.preventDefault();
        //alert('test');
        httpR = new XMLHttpRequest();
       //username validation
   
    if (cusname.value === null || cusname.value === ""){
        cusname.classList.add("error");
        msg.innerHTML= "Name field is empty.";
    }else if (cusname.value !== null || cusname.value !== ""){
        if(!cusname.value.match(usr_regex)){
         cusname.classList.add("error");
         msg.innerHTML= "Name is invalid.";
        }else{
            cusname.classList.add("no-error");
            count++;
        } 
    }else{
        fname.classList.add("no-error");
        count++;
    }

       //password validation
       if (contNum.value === null || contNum.value === ""){
           contNum.classList.add("error");
           msg2.innerHTML= "Contact Number field is empty.";
       }else if (contNum.value !== null || contNum.value !== ""){
            if(!contNum.value.match(usr_regex)){
                contNum.classList.add("error");
                msg2.innerHTML= "Contact Number is invalid.";
            }else{
                contNum.classList.add("no-error");
                count++;
            } 
        }else{
            contNum.classList.add("no-error");
            count++;
        }

        if (measure.value === null || measure.value === ""){
            measure.classList.add("error");
            msg2.innerHTML= "Contact Number field is empty.";
        }else if (measure.value !== null || measure.value !== ""){
             if(!measure.value.match(usr_regex)){
                 measure.classList.add("error");
                 msg2.innerHTML= "Contact Number is invalid.";
             }else{
                 measure.classList.add("no-error");
                 count++;
             } 
         }else{
             measure.classList.add("no-error");
             count++;
         }

        if (count == 2){
            httpR.onreadystatechange = function(){
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                    var response = httpR.responseText;
                    console.log(response);
                    location.assign("/php/CustomerManager.php");
                    
                }else if(response.trim() == " "){
                        msg.textContent = "Please enter all information.";
                      
                    }
                }
            }
            httpR.open('GET', `/php/CustomerManager.php?action=${cusname.value}&phone=${contNum.value}&measure=${measure.value}`, true);
            httpR.send();
    }

    );
}
)

