var text1 = document.getElementsByClassName("text1");
var text2 = document.getElementsByClassName("text2");
var monprofil = document.getElementById("monprofil");

document.addEventListener('DOMContentLoaded', function () {
    if (window.matchMedia("(max-width: 1000px)").matches) {
        text1[0].style.display = "none";
        text1[1].style.display = "none";
        document.getElementsByClassName("fleche")[0].style.transform = "rotate(0deg)";

        text2[0].style.display = "none";
        text2[1].style.display = "none";
        document.getElementsByClassName("fleche")[1].style.transform = "rotate(0deg)";

    }else if(window.matchMedia("(min-width: 1000px)").matches) {
        text1[0].style.display = "block";
        text1[1].style.display = "block";
        document.getElementsByClassName("fleche")[0].style.transform = "rotate(90deg)";

        text2[0].style.display = "block";
        text2[1].style.display = "block";
        document.getElementsByClassName("fleche")[1].style.transform = "rotate(90deg)";
    }
});

window.addEventListener('DOMContentLoaded',function(){
    var elLargeurPage = document.getElementById('largeurPage');

    elLargeurPage.innerHTML = document.body.clientWidth;

    this.addEventListener('resize',function(){

        elLargeurPage.innerHTML = document.body.clientWidth;
        if (elLargeurPage.innerHTML<=1000){
            text1[0].style.display = "none";
            text1[1].style.display = "none";
            document.getElementsByClassName("fleche")[0].style.transform = "rotate(0)";

            text2[0].style.display = "none";
            text2[1].style.display = "none";
            document.getElementsByClassName("fleche")[1].style.transform = "rotate(0)";
        }else{
            text1[0].style.display = "block";
            text1[1].style.display = "block";
            document.getElementsByClassName("fleche")[0].style.transform = "rotate(90deg)";

            text2[0].style.display = "block";
            text2[1].style.display = "block";
            document.getElementsByClassName("fleche")[1].style.transform = "rotate(90deg)";
        }

    });
});

function montrer1(){
    if(window.matchMedia("(max-width: 1000px)").matches){
        if (text1[1].style.display === "none" && text1[0].style.display === "none") {
            text1[0].style.display = "block";
            text1[1].style.display = "block";
            document.getElementsByClassName("fleche")[0].style.transform = "rotate(90deg)";

        } else if (text1[1].style.display !== "none" && text1[0].style.display !== "none") {
            text1[0].style.display = "none";
            text1[1].style.display = "none";
            document.getElementsByClassName("fleche")[0].style.transform = "rotate(0deg)";
        }
    }
}


function montrer2(){
    if(window.matchMedia("(max-width: 1000px)").matches){
        if (text2[1].style.display === "none" && text2[0].style.display === "none") {
            text2[0].style.display = "block";
            text2[1].style.display = "block";
            document.getElementsByClassName("fleche")[1].style.transform = "rotate(90deg)";

        } else if (text2[1].style.display !== "none" && text2[0].style.display !== "none") {
            text2[0].style.display = "none";
            text2[1].style.display = "none";
            document.getElementsByClassName("fleche")[1].style.transform = "rotate(0deg)";
        }
    }
}


document.addEventListener('DOMContentLoaded', function() {
    monprofil.style.display= "block";
});

function description() {

    if (monprofil.style.display === "none"){
        monprofil.style.display = "block";
        document.getElementsByClassName("fleche")[0].style.transform = "rotate(90deg)";
    } else if (monprofil.style.display === "block"){
        monprofil.style.display = "none";
        document.getElementsByClassName("fleche")[0].style.transform = "rotate(180deg)";
    }
}
