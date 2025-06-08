<?php
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserController = new UserController();

    if (isset($_POST["Login"])) {
        $UserController->login();
        echo __LINE__;
    } elseif (isset($_POST["Singup"])) {
        $UserController->singup();
        echo __LINE__;
    } elseif (isset($_POST["logout"])) {
        $UserController->logout();
        echo __LINE__;
    } elseif (isset($_POST["cuenta"])) {
        $UserController->cuenta();
        echo __LINE__;
    } elseif (isset($_POST["update"])) {
        $email = $_SESSION["email"] ?? null;
        $nameN = trim($_POST["nameN"]);
        $password = trim($_POST["password"]) ?: null;
        $imagen = $_FILES["imagen"] ?? null;

        $UserController->update($email, $nameN, $password, $imagen);
        echo __LINE__;
    }
}

class UserController {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=beatpass", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function login(): bool {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $query = "SELECT nameN, email, contrasena FROM usuarios WHERE email = ? AND contrasena = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email, $password]);
        $row = $stmt->fetch();

        if ($row) {
            $_SESSION["logged"] = true;
            $_SESSION["nameN"] = $row["nameN"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["contrasena"];
            header("Location: ../View/Inicio/inicio.php");
            return true;
        } else {
            $_SESSION["logged"] = false;
            $_SESSION["Login_Error"] = "Email or password are wrong";
            header("Location: ../View/InicioSesion/index1.php");
            return false;
        }
    }

    public function logout(): void {
        session_unset();
        session_destroy();
        header("Location: ../View/InicioSesion/index1.php");
        exit();
    }

    public function singup(): bool {
        $nameN = trim($_POST["nameN"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $cpassword = trim($_POST["cpassword"]);

        if ($password !== $cpassword) {
            echo "Las contraseñas no coinciden";
            return false;
        }

        $imagenNombre = null;

        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
            $imagenTmp = $_FILES["imagen"]["tmp_name"];
            $imagenNombre = basename($_FILES["imagen"]["name"]);
            $rutaDestino = "../uploads/" . $imagenNombre;

            if (!file_exists("../uploads")) {
                if (!mkdir("../uploads", 0777, true)) {
                    echo "Error al crear el directorio para las imágenes.";
                    return false;
                }
            }

            if (!move_uploaded_file($imagenTmp, $rutaDestino)) {
                echo "Error al subir la imagen.";
                return false;
            }
        }

        $query = "INSERT INTO usuarios (nameN, email, contrasena, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        try {
            if ($stmt->execute([$nameN, $email, $password, $imagenNombre])) {
                $_SESSION["Singed"] = true;
                header("Location: ../View/InicioSesion/index1.php");
                return true;
            }
        } catch (PDOException $e) {
            $_SESSION["Singed"] = false;
            echo "Error al registrar: " . $e->getMessage();
        }

        return false;
    }

    public function cuenta(): void {
        if ($_SESSION["email"] == "administrador1234@gmail.com") {
            $_SESSION["admin"] = true;
            header("Location: ../View/Cuenta/cuenta_Admin.php");         
        }
        exit();
    }

    public function update(string $email, string $nameN, ?string $password, ?array $imagen): void {
        $sql = "UPDATE usuarios SET nameN = ?";
        $params = [$nameN];

        if (!empty($password)) {
            $sql .= ", contrasena = ?";
            $params[] = $password;
        }

        $imagenNombre = null;

        if ($imagen && $imagen["error"] == 0) {
            $imagenTmp = $imagen["tmp_name"];
            $imagenNombre = basename($imagen["name"]);
            $rutaDestino = "../uploads/" . $imagenNombre;

            if (!file_exists("../uploads")) {
                mkdir("../uploads", 0777, true);
            }

            if (move_uploaded_file($imagenTmp, $rutaDestino)) {
                $sql .= ", imagen = ?";
                $params[] = $imagenNombre;
            }
        }

        $sql .= " WHERE email = ?";
        $params[] = $email;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        header("Location: ../Cuenta/cuentaUpdateDatos.php");
        exit();
    }
}
?>
