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
    <link rel="stylesheet" href="../headerComun.css">
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
                        <p class="estado"><?php echo htmlspecialchars($evento['estado']); ?></p>

                        </form>
                    </div>
                </div>
            <?php endforeach; ?>    
        </div>


            </form>
        </div>
    </div>
</body>
</html>