document.addEventListener("DOMContentLoaded", function (e) {
  var logout = document.getElementById("log-out");
  var addCustm = document.getElementById("addCust");
  var searchCustm = document.getElementById("viewCust");
  var editCustm = document.getElementById("editCust");
  var addMat = document.getElementById("addMat");
  var editMat = document.getElementById("editMat");
  var servStat = document.getElementById("servStatus");

  logout.addEventListener("click", (e) => {
    httpR = new XMLHttpRequest();

    httpR.onreadystatechange = function () {
      if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200) {
        var response = httpR.responseText;
        alert(response);
      }
    };
    httpR.open("GET", "UIHandler.php?action=logout", true);
    httpR.send();
    location.assign("login.html");
  });
  addCustm.addEventListener("click", (e) => {
    location.assign("customer.php");
  });
  searchCustm.addEventListener("click", (e) => {
    location.assign("customer.php");
  });
  editCustm.addEventListener("click", (e) => {
    location.assign("customer.php");
  });
  addMat.addEventListener("click", (e) => {
    location.assign(".php");
  });
  editMat.addEventListener("click", (e) => {
    location.assign(".php");
  });
  servStat.addEventListener("click", (e) => {
    location.assign(".php");
  });
});
