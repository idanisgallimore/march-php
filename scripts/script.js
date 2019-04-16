// message box
var msg = document.querySelector(".message-box");

// GRAB ITEMS FROM URL VARIABLES
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
    }
    return (false);
};
// add items to wishlist 
var productId = getQueryVariable("id");
console.log("This is the product id: " + productId);

var icon = document.querySelector(".item_icon");

if (icon !== null) {
    icon.addEventListener("click", function () {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("request sent");
                // document.querySelector(".test").innerHTML = this.responseText;
                icon.style.color = "#707B7C";
                icon.textContent = this.responseText;
                console.log(this.responseText);
            }
        };
        xhttp.open("POST", "includes/addToWishList.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + productId);
    });
} else {
    console.log("this is null, but ignore me");
}

// Add items to shopping cart 
var btnSub = document.querySelector(".btn-sub");
var size = document.querySelector(".size").value;
var qty = document.querySelector(".qty");
var msgTxt = document.querySelector(".ms-text");

// var productId = getQueryVariable("id");
if (btnSub !== null) {
    btnSub.addEventListener("click", function () {
        var qtyValue = parseInt(qty.value, 10);
        if (qtyValue == 0 || isNaN(qtyValue)) {
            msgTxt.textContent = "Choose a quantity";
            msg.style.display = "block";
            console.log("choose a quantity please");
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("request sent");
                    // document.querySelector(".test").innerHTML = this.responseText;
                    msgTxt.textContent = this.responseText;
                    msg.style.display = "block";
                    console.log(this.responseText);
                }
            };
            xhttp.open("POST", "./includes/addtocart.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`id=${productId}&quantity=${qtyValue}&size=${size}`);
        }


    });
}else{
    console.log("ignore me");
}

msg.addEventListener("click", function () {
    if (msg.style.display == "block") {
        msg.style.display = "none";
    } else {
        msg.style.display = "block";
    }
});
// For testing purpose 
// 4/16 fix wishlist page 
var test = document.querySelectorAll(".btn-test");
console.log(test);
test.forEach(function(element){
    element.addEventListener("click", function (e) {
        var qtyValue = parseInt(qty.value, 10);
        if (qtyValue == 0 || isNaN(qtyValue)) {
            msgTxt.textContent = "Choose a quantity";
            msg.style.display = "block";
            console.log("choose a quantity please");
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("request sent");
                    // document.querySelector(".test").innerHTML = this.responseText;
                    msgTxt.textContent = this.responseText;
                    msg.style.display = "block";
                    console.log(this.responseText);
                }
            };
            xhttp.open("POST", "./includes/addtocart.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`id=${productId}&quantity=${qtyValue}&size=${size}`);
        }


    });
});