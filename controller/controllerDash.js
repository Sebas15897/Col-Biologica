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
                    <img src="${element['co_defaultImg']}" alt="Colección ${element['co_name']}">
                    <h3>${element['co_name']}</h3>
                    <p>${'co_description'}</p>
                </div>'

                `);
            });
        }
        console.log(data)
    })
    .catch(err => {
        console.log(err)
    });
}

( function() {
    mostraColecciones();
} ) ();