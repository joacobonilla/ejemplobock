<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        return view('books.index', compact('books'));
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

        $this->bookService->create($validated);
        return redirect()->route('books.index')->with('success', 'Libro agregado correctamente');
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

        $this->bookService->update($book, $validated);
        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(Book $book)
    {
        $this->bookService->delete($book);
        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente');
    }
}