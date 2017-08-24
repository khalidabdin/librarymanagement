function showhint() {
var email = document.getElementById("universityid").value;
if (universityid != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 var msg = this.responseText;
                 document.getElementById("txtHint").innerHTML = msg;
            }
        };
        xmlhttp.open("GET", "createuser.php?universityid=" + universityID, true);
        xmlhttp.send();
    }
}
