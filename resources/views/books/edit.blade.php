@extends('layout')

@section('content')
    <h1>Editar libro</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre', $book->nombre) }}" required><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" value="{{ old('autor', $book->autor) }}" required><br>

        <label>Género:</label><br>
        <input type="text" name="genero" value="{{ old('genero', $book->genero) }}" required><br>

        <label>Fecha de lanzamiento:</label><br>
        <input type="date" name="fecha_lanzamiento" value="{{ old('fecha_lanzamiento', $book->fecha_lanzamiento) }}" required><br>

        <label>Cantidad de páginas:</label><br>
        <input type="number" name="paginas" value="{{ old('paginas', $book->paginas) }}" required><br>

        <button type="submit">✅ Actualizar</button>
    </form>

    <a href="{{ route('books.index') }}">⬅️ Volver al listado</a>
@endsection
