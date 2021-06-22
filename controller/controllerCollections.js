var formulario = document.getElementById("CrearColeccion");

formulario.addEventListener('submit', function (e){
    e.preventDefault();
    console.log("funcionando");

    var datos = new FormData(CrearColeccion);
    var Nombre = datos.get('Nombre');
    var Propietario = datos.get('Propietario');
    var Curador = datos.get('Curador');
    var Tipo = datos.get('Tipo');
    var Descripcion = datos.get('Descripcion');
    var Direccion = datos.get('Direccion');
    var Ciudad = datos.get('Localidad');
    var Email = datos.get('Email');
    var Numero = datos.get('Numero');
    var Logo = datos.get('Logo');
    var Foto1 = datos.get('Foto1');
    var Foto2 = datos.get('Foto2');
    var Foto3 = datos.get('Foto3');

    fetch('controller/controllerCollections.php',{
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        if (data == '"ok"') {
            alert("Colección registrada correctamente")
            window.location="dash.html";
        }else if(data == '"error"'){
            alert("Ha ocurrido un error intente más tarde");
        }else{
            console.log(data)
        }
        console.log(data)
    })
    .catch(err => {
        console.log(err)
    });
})