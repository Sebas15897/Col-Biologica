var formulario = document.getElementById("CrearRegistro");

formulario.addEventListener('submit', function (e){
    e.preventDefault();
    console.log("funcionando");

    var datos = new FormData(CrearRegistro);
    var NumCatalogo = datos.get('NumCatalogo');
    var filo = datos.get('filo');
    var Clase = datos.get('Clase');
    var Orden = datos.get('Orden');
    var Familia = datos.get('Familia');
    var Genero = datos.get('Genero');
    var Epiteto = datos.get('Epiteto');
    var CollectDate = datos.get('CollectDate');
    var Metodo = datos.get('Metodo');
    var Latitud = datos.get('Latitud');
    var Longitud = datos.get('Longitud');
    var Pais = datos.get('Pais');
    var Departamento = datos.get('Departamento');
    var Localidad = datos.get('Localidad');
    var Sitio = datos.get('Sitio');
    var CollectionId = datos.get('CollectionId');
    var Foto = datos.get('Foto');

    fetch('controller/controllerRegistros.php',{
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        if (data == '"ok"') {
            alert("Registrado correctamente")
            window.location=`coleccion.php?id=${CollectionId}`;
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