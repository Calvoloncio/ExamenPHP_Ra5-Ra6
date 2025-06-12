<!DOCTYPE html> <!-- Define el tipo de documento (HTML5) -->
<html lang="en"> <!-- Comienza el documento en inglés -->

<head>
    <link rel="icon" type="image/png" href="logoBilleteArnau.png"> <!-- Icono de pestaña -->
    <meta charset="UTF-8"> <!-- Configura la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive en móviles -->
    <title>Beat Pass</title> <!-- Título de la página -->
    <link rel="stylesheet" href="StyleR.css"> <!-- Vincula el archivo CSS externo -->
    <link rel="stylesheet" href="../headerComun.css">

    <!-- Carga de fuentes desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@400;600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body> <!-- Comienza el cuerpo de la página -->

    <header> <!-- Encabezado fijo superior -->
        <h1 class="titulo">Beat Pass</h1>
    </header>
    <!-- form -->
    <article>
        <h1 class="titulo">Crea tu cueanta</h1>
        <form action="../../Controler/Controlador.php" method="POST" enctype="multipart/form-data">
            <h3 class="info">Únete a Beat Pass y no te pierdas los mejores eventos.</h3>
        
            <div class="input-group">
                <input type="text" id="nameN" name="nameN" placeholder="Elige un nombre de usuario"><br><br>
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="tu@gmail.com"><br><br>
            </div>
            <div class="input-group">
                <input type="telefono" id="telefono" name="telefono"  pattern="^[0-9]{9}$" title="Debe ingresar 9 dígitos" placeholder="Numero de Telefono" required><br><br>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Crea una contraseña segura"><br><br>
            </div>
            <div class="input-group">
                <input type="password" id="cpassword" name="cpassword" placeholder="Vuelve a escribir la contraseña"><br><br>
            </div>
            <div class="input-group">
                <input type="file" name="imagen" />
            </div>
            
            <div class="buttons">
                <button type="submit" name="Singup" id="Singup" class="button">Registrarse</button>
                <a href="../InicioSesion/index1.php" class="button">
                    <button type="button" id="IrInicio" name="IrInicio"> ¿ya tienes cuenta?Iniciar Sesión</button>
                </a>
            </div>
        </form>
        
    </article>

    <br> <!-- Salto de línea -->
    
    <footer> <!-- Pie de página -->
        <p>&copy; 2025 Beat Pass. Todos los derechos reservados.</p>
    </footer> 

</body>
</html>
