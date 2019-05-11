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
try {
    // var cust_id = '<?php echo $_SESSION["user"];?>';
    var productId = getQueryVariable("id");
    var custId = getQueryVariable("user");
    console.log("This is the product id: " + productId);

    var icon = document.querySelector(".item_icon");

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
        xhttp.send("id=" + productId + "&cust=" + custId);
    });
}catch(error){
    console.log("ignore this: " + error);
}
// Add items to shopping cart 
// try {
//     var btnSub = document.querySelector(".btn-sub");
//     var size = document.querySelector(".size").value;
//     var qty = document.querySelector(".qty");
//     var msgTxt = document.querySelector(".ms-text");

//     btnSub.addEventListener("click", function () {
//         var qtyValue = parseInt(qty.value, 10);
//         if (qtyValue == 0 || isNaN(qtyValue)) {
//             msgTxt.textContent = "Choose a quantity";
//             msg.style.display = "block";
//             console.log("choose a quantity please");
//         } else {
//             var xhttp = new XMLHttpRequest();
//             xhttp.onreadystatechange = function () {
//                 if (this.readyState == 4 && this.status == 200) {
//                     console.log("request sent");
//                     msgTxt.textContent = this.responseText;
//                     msg.style.display = "block";
//                     console.log(this.responseText);
//                 }
//             };
//             xhttp.open("POST", "./includes/addtocart.php", true);
//             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//             xhttp.send(`id=${productId}&quantity=${qtyValue}&size=${size}`);
//         }


//     });
// }
// catch(error){
//     console.log("Ignore this: " + error);
// }
try{

    msg.addEventListener("click", function () {
        if (msg.style.display == "block") {
            msg.style.display = "none";
        } else {
            msg.style.display = "block";
        }
    });
}
catch(error){
    console.log("Ignore this error: " + error);
}
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

// shopping cart update stuff 
var select = document.querySelector(".cart-select");
select.addEventListener("onchange", function(){
    console.log(select.value);
});
console.log("idanis says hi");
