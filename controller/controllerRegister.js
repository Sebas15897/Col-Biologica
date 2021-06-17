var formulario = document.getElementById("formu");

formulario.addEventListener('submit', function (e){
    e.preventDefault();
    console.log("funcionando");

    var datos = new FormData(formu);
    var name = datos.get('Nombres');
    var apellido = datos.get('Apellidos');
    var correo = datos.get('Correo');
    var contraseña = datos.get('Contraseña');

    fetch('controller/controllerRegister.php',{
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        if (data == '"ok"') {
            alert("Usuario registrado correctamente");
            setTimeout(
                function(){
                    window.location="login.html";
                }
            , 2000);
        }else if(data == '"repetido"'){
            alert("Este email ya está registrado");
        }else{
            alert("Ha ocurrido un error intente más tarde");
        }
        console.log(data)
    })
    .catch(err => {
        console.log(err)
    });
})