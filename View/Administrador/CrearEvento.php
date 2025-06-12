<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beat Pass</title>
    <link rel="icon" type="image/png" href="../logoBilleteArnau.png">
    
    <link rel="stylesheet" href="StyleE.css">
    <link rel="stylesheet" href="../headerComun.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="left">
            <div class="izquierda">
                <a href="../Inicio/inicio.php">
                    <img src="../logoBilleteArnau.png" alt="">
                </a>    
            </div>
            <h1 class="titulo">Beat Pass</h1>
        </div>
        <div class="rigth">
            <div class="idioma-selector">
                <select onchange="window.location.href=this.value">
                    <option value="../Inicio/inicio.php" selected>Español</option>
                    <option value="../Inicio/inicio_cat.php">Català</option>
                    <option value="../Inicio/inicio_en.php">English</option>
                </select>
            </div>              
            <!-- Posivilidades dentro de la web -->
            <a href="../eventos/eventos.php">Eventos</a>
            <a href="../lugares/Lugares.php">Lugares</a>
            <a href="../Cuenta/cuenta.php">Cuenta</a>  
            <a href="../Inicio/inicio.php">Inicio</a>      
        </div>
    </header>

    <body>
<form action="../../Controler/ControladorEvento.php" method="POST" enctype="multipart/form-data">
    <label>Fecha:</label>
    <input type="date" name="fecha" required><br>

    <label>Artista:</label>
    <input type="text" name="artista" required><br>

    <label>Lugar:</label>
    <input type="text" name="lugar" required><br>

    <label>Tipo de evento:</label>
    <input type="text" name="tipo_evento"><br>

    <label>Imagen:</label>
    <input type="file" name="imagen" /><br>

        <label>Estado:</label>
    <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="no activo">No activo</option>
    </select><br>

    <button type="submit" name="crear_evento">Crear evento</button>
</form>
</body>