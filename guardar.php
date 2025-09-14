<?php
include("config.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$grado = $_POST['grado'];
$email = $_POST['email'];

// Intentar guardar en Supabase vía REST API
$data = [
  "nombre" => $nombre,
  "apellido" => $apellido,
  "fecha_nacimiento" => $fecha_nacimiento,
  "grado" => $grado,
  "email" => $email
];

$options = [
  "http" => [
    "header" => "Content-Type: application/json\r\n" .
                "apikey: " . SUPABASE_API_KEY . "\r\n" .
                "Authorization: Bearer " . SUPABASE_API_KEY . "\r\n",
    "method" => "POST",
    "content" => json_encode([$data]) // importante: array
  ]
];

$context = stream_context_create($options);
$result = @file_get_contents(SUPABASE_URL . "/rest/v1/alumnos", false, $context);

if ($result === FALSE) {
    // Si falla → guardar en SQLite local
    $stmt = $db->prepare("INSERT INTO alumnos (nombre, apellido, fecha_nacimiento, grado, email) VALUES (:nombre, :apellido, :fecha, :grado, :email)");
    $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
    $stmt->bindValue(':apellido', $apellido, SQLITE3_TEXT);
    $stmt->bindValue(':fecha', $fecha_nacimiento, SQLITE3_TEXT);
    $stmt->bindValue(':grado', $grado, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->execute();
    echo "⚠️ Guardado en SQLite local (Supabase no disponible)";
} else {
    echo "✅ Guardado en Supabase";
}

echo "<br><a href='index.php'>Volver</a>";
?>
