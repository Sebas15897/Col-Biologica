//Modulo que controlla el Dash

function rutaCrear(){
    window.location="crear.html";
}

function mostraColecciones(params) {
    fetch('controller/dashCollections.php',{
        method: 'POST',
        body: ""
    })
    .then(response => response.json())
    .then(data => {
        if (data == '"NoCollection"') {
            window.location="dash.html";
        }else{
            var divCollection = document.getElementById("tarjetas");
            data.forEach(element => {
                divCollection.insertAdjacentHTML('beforeend',
                `
                <div class="tarjeta">
                    <a href="coleccion.php?id=${element['co_id']}">
                        <img src="../archivos/${element['co_logo']}" alt="Colección ${element['co_name']}">
                        <h2>${element['co_name']}</h2>
                    <a/>
                </div>

                `);
            });
        }
        console.log(data)
    })
    .catch(err => {
        console.log(err)
    })
}

function leerCookie(nombre) {
    var lista = document.cookie.split(";");
    for (i in lista) {
        var busca = lista[i].search(nombre);
        if (busca > -1) {micookie=lista[i]}
        }
    var igual = micookie.indexOf("=");
    var valor = micookie.substring(igual+1);
    return valor;
    }

function saludo() {
    var nombreUser = leerCookie("UserName");
    var saludoCampo = document.getElementById("saludo");
    var saludo = `Hola ${nombreUser}!`;
    saludoCampo.innerText = saludo;
}

( function() {
    mostraColecciones();
    saludo();
} ) ();