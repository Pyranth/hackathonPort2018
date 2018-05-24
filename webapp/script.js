var brojRedova=0;

function azurirajTabelu() {
    var xhr = false;
    if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject();

    xhr.open("GET", "generisiTabelu.php?req="+brojRedova);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200)
        {
            ucitajTabelu(this.responseText);
        }
    };
    xhr.send();
}

function ucitajTabelu(tabela) {
    var divTabela = document.getElementById("tabela");
    divTabela.innerHTML = tabela;
}

setInterval(azurirajTabelu,1000);