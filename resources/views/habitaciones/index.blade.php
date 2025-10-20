<!DOCTYPE html>
<html>
<head>
    <title>Listado de Habitaciones</title>
</head>
<body>
    <h1>Habitaciones</h1>
    <a href="{{ route('habitaciones.create') }}">➕ Nueva Habitación</a>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Número</th>
                <th>Tipo</th>
                <th>Precio por Noche</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($habitaciones as $habitacion)
                <tr>
                    <td>{{ $habitacion->numero }}</td>
                    <td>{{ $habitacion->tipo }}</td>
                    <td>${{ $habitacion->precio_noche }}</td>
                    <td>{{ ucfirst($habitacion->estado) }}</td>
                    <td>
                        <a href="{{ route('habitaciones.edit', $habitacion->id) }}">Editar</a>
                        <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta habitación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
