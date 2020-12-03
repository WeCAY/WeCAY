function Check(){
    var pass = document.forms[0].password.value;
    var passwordLow = pass.toLowerCase();
    var majuscule = false;


    if (pass != passwordLow){
        majuscule = true;
    }

    var taille = pass.length;
    var numerique = false;
    for(i=0;i<taille-1; i++){
        var caractere = pass.substring(i,i+1);
        if (!isNaN(caractere)){
            numerique = true;
        }
    }

    if (majuscule==false && numerique==false){
        if(document.getElementById)
        {
            document.getElementById("mdp").style.borderColor="red";
        }
    }
    else
    {
        if((majuscule || numerique) && taille<=8)
        {
            document.getElementById("mdp").style.borderColor="orange";
        }
        else if(majuscule && numerique && taille>8)
        {
            document.getElementById("mdp").style.borderColor="green";
        }
    }

}