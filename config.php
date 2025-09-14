<?php
// Configuración SQLite local (solo para respaldo)
$db = new SQLite3('escuela.db');
$db->exec("CREATE TABLE IF NOT EXISTS alumnos (
    id_alumno INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    apellido TEXT NOT NULL,
    fecha_nacimiento DATE,
    grado TEXT NOT NULL,
    email TEXT UNIQUE
)");

// Configuración Supabase
define('SUPABASE_URL', 'https://tyidazkjehjzkgcnjtiy.supabase.co');
define('SUPABASE_API_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InR5aWRhemtqZWhqemtnY25qdGl5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTc4MTI4MTYsImV4cCI6MjA3MzM4ODgxNn0.3kNfUi34qoCtr3sCXYV9lL4UgXPWeQTqym_Of6p2agE');
?>
