document.addEventListener('DOMContentLoaded', function(){
    httpR = new XMLHttpRequest();

    httpR.onreadystatechange = function(){
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
            var response = httpR.responseText;
            var main = document.querySelector(".customers");
            main.innerHTML = response.trim();

            //lower section not edited


            let cm_btns = document.querySelectorAll(".complete");
            let ca_btns = document.querySelectorAll(".cancel");
            cm_btns.forEach(element => {
                element.addEventListener('click', function(e){
                    e.preventDefault();
                    var divName = ".O" + element.value; 
                    var divs = document.querySelector(divName);
                    divs.classList.add("status-change");

                    fetch(`/php/UIHandler.php?action=processorder&complete=${element.value}`)
                        .then(response => response.text())
                        .then(data => {})
                        .catch(e => console.log(e));
                });
            });

        }
    }
    httpR.open('GET', "/php/UIHandler.php?action=getorder", true);
    httpR.send();

    var out_btn = document.getElementById('log-out');

    out_btn.addEventListener('click', (e)=>{
        httpR = new XMLHttpRequest();

        httpR.onreadystatechange = function(){  
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
            }
        }
        httpR.open('GET', "/Kish-Klothing/kishklothing/php/UIHandler.php?action=logout",true);
        httpR.send();
        location.assign("/html/login.html");
    });
});