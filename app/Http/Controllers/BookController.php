<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'fecha_lanzamiento' => 'required|date',
            'paginas' => 'required|integer|min:1',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Libro agregado correctamente');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'fecha_lanzamiento' => 'required|date',
            'paginas' => 'required|integer|min:1',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente');
    }
}