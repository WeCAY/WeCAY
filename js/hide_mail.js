function hide_mail(mail){
    var hidden = mail[0];
    var len = mail.length;
    var last = mail.lastIndexOf('.');
    console.log(last);
    for (var i = 1; i < last; i++ ){
        if(mail[i]==='@'){
            hidden+='@';
            i=i+1;
        }
        if (mail[i]==='.'){
            hidden+='.';
            hidden+=mail[i+1];
            i = i+1;
        }

        else{
            hidden+='*';
        }
    }
    for (var i = last; i<len; i++){
        hidden+=mail[i];
    }
    return hidden;
}
