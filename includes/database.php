<?php

$db = mysqli_connect('localhost', 'root', '1019', 'negociamos');

$db->set_charset('utf8');
mysqli_set_charset($db, 'utf8mb4');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
