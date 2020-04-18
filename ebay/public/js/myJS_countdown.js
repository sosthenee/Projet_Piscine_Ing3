$(document).ready(

    function decompte(heures, minutes, secondes) {
    document.time.decompte.value=heures+":"+minutes+":"+secondes;

    if(secondes > 0) {
        secondes--;
    } else if(minutes > 0) {
        minutes--;
        secondes = 59;
    } else if(heures > 0) {
        heures--;
        minutes = 59;
    }
    setTimeout("decompte("+heures+", "+minutes+", "+secondes+")", 1000);
});
