<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function getAll()
    {
        return Book::all();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function update(Book $book, array $data)
    {
        return $book->update($data);
    }

    public function delete(Book $book)
    {
        return $book->delete();
    }
}
