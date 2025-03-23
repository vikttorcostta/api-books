<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            return response()->json(["message" => "Nenhuma categoria encontrada"], 204);
        }
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validationData = $request->validate([
                'name' => 'required|max:255',
            ]);

            $category = Category::create($validationData);
            DB::commit();
            return response()->json($category, 201);

        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(["message" => "Categoria não encontrada"], 404);
        }
        return response()->json($category, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::find($id);

            if (is_null($category)) {
                return response()->json(["message" => "Categoria não encontrada"], 404);
            }

            $validatedData = $request->validate([
                'name' => 'required|max:255',
            ]);

            $category->update($validatedData);
            DB::commit();
            return response()->json($category, 200);

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(["Message" => "Categoria não encontrada"], 404);
        }
        $category->delete();
        return response()->json(["Message" => "Categoria excluída com sucesso"], 201);
    }
}
