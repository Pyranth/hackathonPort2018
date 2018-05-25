
function azurirajTabelu() {
    var xhr = false;
    if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject();

    xhr.open("GET", "generisiTabelu.php?req="+0);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200)
        {
            ucitajTabelu(this.responseText,"tabela");
        }
    };
    xhr.send();
}

setInterval(azurirajTabelu,10000);



function ucitajTabelu(tabela,idTabela) {
    var divTabela = document.getElementById(idTabela);
    divTabela.innerHTML = tabela;
}