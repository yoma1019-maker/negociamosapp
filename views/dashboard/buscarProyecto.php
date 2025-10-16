<?php
require_once __DIR__ . '/../includes/config/database.php';

$conexion = $db;

$proyecto = $_POST['proyecto'] ?? '';
$lote = $_POST['lote'] ?? '';

if ($proyecto && $lote) {
    $query = "SELECT etapa, aream, estado, valor_aream, tipo_lote, valor_total, porcen_inicial, cuota_inicial, 
                     valor_restante, cuotas, valor_cuotas
              FROM proyectos 
              WHERE proyecto = ? AND lote = ? LIMIT 1";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("si", $proyecto, $lote);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    echo json_encode($fila ?: []);
}

