function validate_matching(){
    var str = document.getElementById("signal").value;
    var res = str.substring(1, 2);
    if ( res == "k")
    {
        return true;
    }
    else
    {
        event.preventDefault();
        return false;
    }
}
