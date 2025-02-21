<?php
$servername = "sql304.infinityfree.com"; // El servidor MySQL de InfinityFree
$username = "if0_38362619";  // Tu usuario de MySQL en InfinityFree
$password = "RleOnYklGb";  // Contraseña de la base de datos de InfinityFree
$dbname = "if0_38362619"; // Nombre de la base de datos que hayas creado en InfinityFree
$port = 3306;  // Puerto común para MySQL

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");

//recepciona la informacion 
header("Content-Type: application/json");
$metodo = $_SERVER['REQUEST_METHOD'];

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$buscarId = explode('/', $path);
$id = ($path !== '/') ? end($buscarId) : null;

switch ($metodo) {
    // SELECT usuarios
    case 'GET':
        consulta(); 
        break;
    // INSERT
    case 'POST':
        insertar();  // Llamamos la función insertar sin pasarle parámetros
        break;
    // DELETE
    case 'DELETE':
        borrar($conn, $id);  // Pasamos la conexión y el ID a la función borrar
        break;
    default:
        echo json_encode(["error" => "Método no permitido"]);
}

function consulta() {
    global $conn;

    // Consulta para obtener todos los usuarios
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);
    } else {
        echo json_encode(["message" => "No se encontraron usuarios"]);
    }
}

function insertar() {
    global $conn;

    // Recibimos el dato y lo decodificamos para rediseccionarlo
    $dato = json_decode(file_get_contents('php://input'), true);
    
    // Verificamos que los datos existan
    if (isset($dato['first_name'], $dato['last_name'], $dato['age'], $dato['curp'])) {
        // Extraemos los datos
        $first_name = $conn->real_escape_string($dato['first_name']);
        $last_name = $conn->real_escape_string($dato['last_name']);
        $age = (int) $dato['age'];
        $curp = $conn->real_escape_string($dato['curp']);

        // Preparamos la consulta para insertar los datos
        $sql = "INSERT INTO users (first_name, last_name, age, curp) VALUES ('$first_name', '$last_name', $age, '$curp')";

        // Ejecutamos la consulta y verificamos si fue exitosa
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Usuario creado exitosamente", "id" => $conn->insert_id]);
        } else {
            echo json_encode(["error" => "Error al crear el usuario: " . $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Faltan datos para insertar el usuario"]);
    }
}

function borrar($conexion, $id) {
    // Verificamos si el ID es válido
    if ($id && is_numeric($id)) {
        // Sanitizamos el ID para evitar SQL injection
        $id = (int) $id;

        // Preparamos la consulta DELETE
        $sql = "DELETE FROM users WHERE id = $id";

        // Ejecutamos la consulta y verificamos si fue exitosa
        if ($conexion->query($sql) === TRUE) {
            echo json_encode(["message" => "Usuario eliminado exitosamente"]);
        } else {
            echo json_encode(["error" => "Error al eliminar el usuario: " . $conexion->error]);
        }
    } else {
        echo json_encode(["error" => "ID inválido"]);
    }
}

$conn->close();
?>
