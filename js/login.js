document.addEventListener('DOMContentLoaded', function(){
    window.history.forward();

        var username = document.getElementsByClassName("username")[0];
        var password = document.getElementsByClassName("password")[0];
        var btn = document.getElementById("loginbtn");
        var txt_field = document.getElementsByClassName("txt_field");
        var txt_field2 = document.getElementsByClassName("txt_field2");
        var regex = ("/^(?=[a-zA-Z0-9._]{4,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/");
        var count = 0;
        //window.onclick = function(e) {
           // if (e.target == modal) {
                //modal.style.display = "none";
       // }
        btn.addEventListener('click', (e)=>{
            e.preventDefault();
            httpR = new XMLHttpRequest();
        if (username === null || username === ""){
            username.style.bordercolor="red";
        }else if (username.value !== null || username.value !== ""){
            if(!username.value.match(regex)){
                txt_field.innerHTML= "Username is invalid.";
            
                count++;
            }else{
                count++;
        }
        if (password === null || password === ""){
            txt_field2.innerHTML= "Password field is empty.";
        }else if (password !== null || password !== ""){
            if(!password.value.match(regex)){
                txt_field2.innerHTML= "Password is invalid.";
                
                    count++;
                
            }else{
                count++;
            }

            if (count == 2){
                httpR.onreadystatechange = function(){
                    if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                        var response = httpR.responseText;
                        console.log(response);
                        if(response.trim() == "owner"){
                            location.replace = ("./php/owner.php");
                        }else if(response.trim() == "emp1" || "emp2" || "emp3" || "emp4"){
                            location.replace = ("./php/staff.php");
                        }
                    }
            }
            httpR.open('GET', "/php/UIHandler.php?action=login&username="+username.value+"&password="+password.value, true);
            httpR.send();
               // httpR.open("/html/login.html")
           
        }
        }
    
}
        })
    })
