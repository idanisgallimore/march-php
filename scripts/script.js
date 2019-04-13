// GRAB ITEMS FROM URL VARIABLES
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
};
// add items to wishlist 
var productId = getQueryVariable("id");
console.log("This is the product id: " + productId);

var icon = document.querySelector(".item_icon");

icon.addEventListener("click", function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("request sent");
            // document.querySelector(".test").innerHTML = this.responseText;
            icon.style.color  = "#707B7C";
            icon.textContent = this.responseText;
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "includes/addToWishList.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + productId);
});

// Add items to shopping cart 
var btnSub = document.querySelector(".btn-sub");
var qty = getQueryVariable("quantity");
var size = getQueryVariable("size");
// var productId = getQueryVariable("id");
btnSub.addEventListener("click", function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("request sent");
            // document.querySelector(".test").innerHTML = this.responseText;
            
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "./includes/addtocart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${productId}&quantity=${qty}&size=${size}`);
}); 