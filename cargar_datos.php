<?php

require_once 'conexion.php';

$datos = $_POST['datos'] ?? '';

if($datos == 'categorias'){
    $stmt = $conn->prepare('SELECT * FROM categorias');
}
else if($datos == 'medicamentos'){
    $stmt = $conn->prepare('SELECT * FROM medicamentos');
}
else if($datos == 'lotes'){
    $stmt = $conn->prepare('SELECT * FROM lotes');
}
else{
    die(json_encode([]));
}

$stmt->execute();
$results = $stmt->get_result();

$resp = [];

while($row = $results->fetch_assoc()){
    $resp[] = $row;
}

echo json_encode($resp);