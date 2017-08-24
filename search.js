function searchtitle(){
       var name = document.getElementById('sub_name').value;
        if (name != "") {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    document.getElementById("table_ajax").innerHTML = msg;
                  }
            };
        xmlhttp.open("POST", "table_div1.php?sub_name=" + name, true);
        xmlhttp.send();  
        }         
}
