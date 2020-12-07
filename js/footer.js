var text1 = document.getElementsByClassName("text1");
var text2 = document.getElementsByClassName("text2");


document.addEventListener('DOMContentLoaded', function () {
    if (window.matchMedia("(max-width: 1200px)").matches) {
        text1[0].style.display = "none";
        text1[1].style.display = "none";

        text2[0].style.display = "none";
        text2[1].style.display = "none";
    }else if(window.matchMedia("(min-width: 1200px)").matches) {
        text1[0].style.display = "block";
        text1[1].style.display = "block";

        text2[0].style.display = "block";
        text2[1].style.display = "block";
    }
});

window.addEventListener('DOMContentLoaded',function(){
    var elLargeurPage = document.getElementById('largeurPage');

    elLargeurPage.innerHTML = document.body.clientWidth;

    this.addEventListener('resize',function(){
        elLargeurPage.innerHTML = document.body.clientWidth;
        if (elLargeurPage.innerHTML<=1200){
            text1[0].style.display = "none";
            text1[1].style.display = "none";

            text2[0].style.display = "none";
            text2[1].style.display = "none";
        }else{
            text1[0].style.display = "block";
            text1[1].style.display = "block";

            text2[0].style.display = "block";
            text2[1].style.display = "block";
        }

    });
});

function montrer1(){
    if(window.matchMedia("(max-width: 1200px)").matches){
        if (text1[1].style.display === "none" && text1[0].style.display === "none") {
            text1[0].style.display = "block";
            text1[1].style.display = "block";

        } else if (text1[1].style.display !== "none" && text1[0].style.display !== "none") {
            text1[0].style.display = "none";
            text1[1].style.display = "none";
        }
    }
}


function montrer2(){
    if(window.matchMedia("(max-width: 1200px)").matches){
        if (text2[1].style.display === "none" && text2[0].style.display === "none") {
            text2[0].style.display = "block";
            text2[1].style.display = "block";

        } else if (text2[1].style.display !== "none" && text2[0].style.display !== "none") {
            text2[0].style.display = "none";
            text2[1].style.display = "none";
        }
    }
}
