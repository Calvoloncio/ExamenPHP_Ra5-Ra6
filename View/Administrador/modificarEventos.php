<?php
require_once '../../Controler/ControladorEvento.php';

$eventoController = new EventoController();
$eventos = $eventoController->leer();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - BeatPass</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Eventos</h1>
        
        <div class="eventos-grid">
            <?php foreach ($eventos as $evento): ?>
                <div class="evento-card">
                    <?php if ($evento['imagen']): ?>
                        <img src="../uploads/<?php echo htmlspecialchars($evento['imagen']); ?>" 
                             alt="<?php echo htmlspecialchars($evento['artista']); ?>" 
                             class="evento-imagen">
                    <?php endif; ?>
                    
                    <div class="evento-info">
                        <h3><?php echo htmlspecialchars($evento['artista']); ?></h3>
                        <p class="fecha"><?php echo htmlspecialchars($evento['fecha']); ?></p>
                        <p class="lugar"><?php echo htmlspecialchars($evento['lugar']); ?></p>
                        <p class="tipo"><?php echo htmlspecialchars($evento['tipo_evento']); ?></p>
                        
                        <form method="POST" action="../../Controller/EventoController.php" class="form-eliminar">
                            <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
                            <button type="submit" name="eliminar_evento" onclick="return confirm('¿Eliminar este evento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="crear-evento">
            <h2>Crear Nuevo Evento</h2>
            <form method="POST" action="../../Controller/EventoController.php" enctype="multipart/form-data">
                <input type="date" name="fecha" required>
                <input type="text" name="artista" placeholder="Artista" required>
                <input type="text" name="lugar" placeholder="Lugar" required>
                <select name="tipo_evento" required>
                    <option value="">Tipo de evento</option>
                    <option value="concierto">Concierto</option>
                    <option value="festival">Festival</option>
                    <option value="teatro">Teatro</option>
                </select>
                <input type="file" name="imagen" accept="image/*">
                <button type="submit" name="crear_evento">Crear Evento</button>
            </form>
        </div>
    </div>
</body>
</html>