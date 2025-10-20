<!DOCTYPE html>
<html>
<head>
    <title>Crear Habitación</title>
</head>
<body>
    <h1>Crear nueva habitación</h1>
    <form action="{{ route('habitaciones.store') }}" method="POST">
        @csrf
        <label>Número:</label>
        <input type="text" name="numero" required><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" required><br>

        <label>Precio por noche:</label>
        <input type="number" step="0.01" name="precio_noche" required><br>

        <label>Estado:</label>
        <select name="estado">
            <option value="libre">Libre</option>
            <option value="ocupada">Ocupada</option>
            <option value="mantenimiento">Mantenimiento</option>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('habitaciones.index') }}">Volver</a>
</body>
</html>
