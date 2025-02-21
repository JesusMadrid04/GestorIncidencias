<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Ticket Creado</title>
</head>
<body>
<h1>Se ha creado un nuevo ticket</h1>
<p>Título: {{ $ticket->title }}</p>
<p>Categoría: {{ $ticket->category }}</p>
<p>Prioridad: {{ $ticket->priority }}</p>
<p>Descripción: {{ $ticket->body }}</p>
</body>
</html>
