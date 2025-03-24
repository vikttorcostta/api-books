<?php

namespace App\Http\Controllers;

use App\Enums\Rate;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reviews = Review::all();
        if ($reviews->isEmpty()) {
            return response()->json(["message" => "Não foram encontradas avaliações"], 204);
        }
        return response()->json($reviews,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'rating' => ['nullable', new Enum(Rate::class)],
                'review' => 'nullable',
                'user_id' => 'required|exists:users,id',
                'book_id' => 'required|exists:books,id'
            ]);
            $review = Review::create($validatedData);
            DB::commit();
            return response()->json($review, 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['Erro ao criar avaliação' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::find($id);
        if (is_null($review)) {
            return response()->json(["message" => "Avaliação não encontrada"], 404);
        }
        return response()->json($review, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $review = Review::find($id);
            if (is_null($review)) {
                return response()->json(["message" => "Nenhuma avaliação encontrada"], 404);
            }

            $validatedData = $request->validate([
                'rating' => ['nullable', new Enum(Rate::class)],
                'review' => 'nullable',
                'user_id' => 'required|exists:users,id',
                'book_id' => 'required|exists:books,id'
            ]);

            $review->update($validatedData);

            DB::commit();

            return response()->json($review, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['Erro ao atualizar avaliação' => $exception->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        if (is_null($review)) {
            return response()->json(["message" => "Avaliação não encontrada"], 404);
        }
        $review->delete();
        return response()->json(["message" => "Avaliação excluída com sucesso"], 201);
    }
}
