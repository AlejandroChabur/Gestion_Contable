<!DOCTYPE html>
<html>
<head>
    <title>Editar Habitación</title>
</head>
<body>
    <h1>Editar Habitación</h1>
    <form action="{{ route('habitaciones.update', $habitacione->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Número:</label>
        <input type="text" name="numero" value="{{ $habitacione->numero }}" required><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ $habitacione->tipo }}" required><br>

        <label>Precio por noche:</label>
        <input type="number" step="0.01" name="precio_noche" value="{{ $habitacione->precio_noche }}" required><br>

        <label>Estado:</label>
        <select name="estado">
            <option value="libre" {{ $habitacione->estado == 'libre' ? 'selected' : '' }}>Libre</option>
            <option value="ocupada" {{ $habitacione->estado == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
            <option value="mantenimiento" {{ $habitacione->estado == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('habitaciones.index') }}">Volver</a>
</body>
</html>
