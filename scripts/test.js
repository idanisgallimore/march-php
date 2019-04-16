msg.addEventListener("click", function () {
    if (msg.style.display == "block") {
        msg.style.display = "none";
    }
    else {
        msg.style.display = "block";
    }
});
// For testing purpose 
var test = document.querySelectorAll(".btn-test");
test.addEventListener("click", function () {
    alert("hello miami");
});
