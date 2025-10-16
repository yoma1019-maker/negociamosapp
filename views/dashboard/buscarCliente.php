<?php
require_once __DIR__ . '/../includes/config/database.php';
header('Content-Type: application/json; charset=utf-8');

$conexion = $db;

// Recibir filtros
$nombre  = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$celular = trim($_POST['celular'] ?? '');

// Validar que al menos venga un filtro
if (empty($nombre) && empty($email) && empty($celular)) {
    echo json_encode(['error' => 'Debes ingresar al menos un filtro']);
    exit;
}

// Construir query dinámica
$sql = "SELECT nombre, nacimiento, c_nacimiento, sexo, t_documento, otro_doc, cedula, expedicion, lugarexp, 
celular, celular2, civil, nacionalidad, otro_nac, direccion, ciudad, departamento, pais, email
        FROM clientes 
        WHERE 1=1";

$params = [];
$types  = "";

if (!empty($nombre)) {
    $sql .= " AND nombre LIKE ?";
    $params[] = "%$nombre%";
    $types   .= "s";
}
if (!empty($email)) {
    $sql .= " AND email = ?";
    $params[] = $email;
    $types   .= "s";
}
if (!empty($celular)) {
    $sql .= " AND celular = ?";
    $params[] = $celular;
    $types   .= "s";
}

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    echo json_encode(['error' => 'Error en la consulta']);
    exit;
}

// Asociar parámetros si existen
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Si no se encuentra cliente
if ($result->num_rows === 0) {
    echo json_encode(['error' => 'No se encontró ningún cliente con esos datos']);
    exit;
}

// Tomar el primer cliente encontrado
$cliente = $result->fetch_assoc();

// Respuesta JSON con los campos exactos de tu formulario
echo json_encode([
    'nombre'       => $cliente['nombre'] ?? '',
    'nacimiento'   => $cliente['nacimiento'] ?? '',
    'c_nacimiento' => $cliente['c_nacimiento'] ?? '',
    'sexo'         => $cliente['sexo'] ?? '',
    't_documento'  => $cliente['t_documento'] ?? '',
    'cedula'       => $cliente['cedula'] ?? '',
    'expedicion'   => $cliente['expedicion'] ?? '',
    'lugarexp'     => $cliente['lugarexp'] ?? '',
    'celular'      => $cliente['celular'] ?? '',
    'celular2'     => $cliente['celular2'] ?? '',
    'civil'        => $cliente['civil'] ?? '',
    'nacionalidad' => $cliente['nacionalidad'] ?? '',
    'otro_nac'    => $cliente ['otro_nac'] ?? '',
    'direccion'    => $cliente['direccion'] ?? '',
    'ciudad'       => $cliente['ciudad'] ?? '',
    'departamento' => $cliente['departamento'] ?? '',
    'pais'         => $cliente['pais'] ?? '',
    'email'        => $cliente['email'] ?? '',
    
]);


$stmt->close();
$conexion->close();
