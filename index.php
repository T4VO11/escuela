<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Alumnos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 40px; }
    form, table { margin-bottom: 20px; }
    input, button { padding: 8px; margin: 5px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 10px; }
    th { background: #eee; }
  </style>
</head>
<body>
  <h1>Registro de Alumnos</h1>
  <form method="POST" action="guardar.php">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="date" name="fecha_nacimiento">
    <input type="text" name="grado" placeholder="Grado" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Guardar</button>
  </form>

  <h2>Lista de Alumnos (SQLite local)</h2>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Grado</th><th>Email</th></tr>
    <?php
      $res = $db->query("SELECT * FROM alumnos ORDER BY id_alumno DESC");
      while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
          <td>{$row['id_alumno']}</td>
          <td>{$row['nombre']}</td>
          <td>{$row['apellido']}</td>
          <td>{$row['grado']}</td>
          <td>{$row['email']}</td>
        </tr>";
      }
    ?>
  </table>
</body>
</html>
