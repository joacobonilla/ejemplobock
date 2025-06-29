@extends('layout')

@section('content')
    <h1>Listado de Libros</h1>

    <a href="{{ route('books.create') }}">➕ Agregar nuevo libro</a>

    @if ($books->isEmpty())
        <p>No hay libros cargados.</p>
    @else
        <ul>
            @foreach ($books as $book)
                <li style="margin-bottom: 15px;">
                    <strong>{{ $book->nombre }}</strong>  
                    <br>Autor: {{ $book->autor }}
                    <br>Género: {{ $book->genero }}
                    <br>Lanzamiento: {{ $book->fecha_lanzamiento }}
                    <br>Páginas: {{ $book->paginas }}
                    <br>
                    <a href="{{ route('books.edit', $book) }}">✏️ Editar</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este libro?')">🗑️ Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
