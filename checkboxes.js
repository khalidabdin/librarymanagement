function check_all(){
var colors = document.forms[1];
var i;
if (colors[1].checked) 
for (i = 0; i < colors.length; i++) 
  colors[i].checked=true;
else
for (i = 0; i < colors.length; i++) 
  colors[i].checked=false;
}