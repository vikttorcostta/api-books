<?php

namespace App\Http\Controllers;

use App\Enums\StatusBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required',
                'cover' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'required',
                'publisher' => 'required',
                'publication_year' => 'required|numeric',
                'isbn' => 'nullable',
                'status' => ['required', new Enum(StatusBook::class)],
            ]);
            $book = Book::create($validateData);
            DB::commit();
            return response()->json($book, 201);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['Erro ao salvar livro:' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(["message" => "Livro não encotrado"], 404);
        }

        return response()->json($book,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required',
                'cover' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'required',
                'publisher' => 'required',
                'publication_year' => 'required|numeric',
                'isbn' => 'nullable',
                'status' => ['required', new Enum(StatusBook::class)],
            ]);
            $book = Book::create($validateData);
            DB::commit();
            return response()->json($book, 201);
        } catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['Erro ao atualizar livro:' => $exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(["message" => "Livro não encontrado"], 404);
        }
        $book->delete();
        return response()->json(["message" => "Livro excluído com sucesso"], 201);
    }
}
