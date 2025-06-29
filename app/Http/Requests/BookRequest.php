<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    
    public function authorize()
    {
        return false;
    }

    
    public function rules(): array
{
    return [
        'nombre' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'genero' => 'required|string|max:255',
        'fecha_lanzamiento' => 'required|date',
        'cantidad_paginas' => 'required|integer|min:1',
    ];
}
}