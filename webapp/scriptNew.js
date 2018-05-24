
function azurirajTabeluBooking() {

    var xhr = false;
    if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject();

    xhr.open("GET", "booking-form.php?checking="+document.getElementsByName('checking')[0].value
        +"&checkout="+document.getElementsByName('checkout')[0].value
        +"&adults="+document.getElementsByName('adults')[0].value+"&children="+document.getElementsByName('children')[0].value);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200)
        {
            ucitajTabelu(this.responseText);
        }
    };
    xhr.send();
}

function ucitajTabelu(tabela) {
    var divTabela = document.getElementById("tabelaBooking");
    divTabela.innerHTML = tabela;
}