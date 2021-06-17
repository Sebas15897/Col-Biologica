var formulario = document.getElementById("formi");

formulario.addEventListener('submit', function (e){
    e.preventDefault();
    console.log("funcionando");

    var datos = new FormData(formi);
    var correo = datos.get('Correo');
    var contraseña = datos.get('Contraseña');

    fetch('controller/controllerLogin.php',{
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        if (data == '"ok"') {
            window.location="dash.html";
        }else if(data == '"invalid"'){
            alert("Usuario o contraseña incorrecta");
        }else{
            alert("Ha ocurrido un error intente más tarde");
        }
        console.log(data)
    })
    .catch(err => {
        console.log(err)
    });
})