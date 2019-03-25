var result = document.getElementById("result");
function search(string){
    if(string.length == 0){
        result.innerHTML = "none";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result.innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "includes/test.inc.php?q=" + string, true);
        xmlhttp.send();
        // result.innerHTML = string;
        // return;
    }
    console.log(string);
    }
}
