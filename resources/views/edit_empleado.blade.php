<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>

<h1>Editar Empleado</h1>

<form method ="POST" action="{{ route('empleados.update', $empleado) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

    @csrf <!-- Agregar el token CSRF -->
    
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{$empleado->nombre}}" required><br><br>

    <label for="sueldo">Sueldo:</label>
    <input type="number" id="sueldo" name="sueldo" value="{{$empleado->sueldo}}"  required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="{{$empleado->telefono}}" required><br><br>

    <label for="puesto">Puesto:</label>
    <input type="text" id="puesto" name="puesto" value="{{$empleado->puesto}}" required><br><br>

    <label for="fecha_nac">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nac" name="fecha_nac" value="{{$empleado->fecha_nac}}" required><br><br>

    <button type="submit">Guardar Empleado</button>
</form>

</body>
</html>
