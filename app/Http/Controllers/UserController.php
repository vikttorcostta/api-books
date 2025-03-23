<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\json;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return response()->json(["message "=> "Nenhum usuário encontrado"], 204);
        }

        return response()->json($users, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);
            $user = User::create($validatedData);

            DB::commit();

            return response()->json($user, 201);

        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['Erro ao cadastrar usuário' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(["message" => "Usuário não encontrado"], 404);
        }
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id);
            if (is_null($user)) {
                return response()->json('Usuário não encontrado.', 404);
            }
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'required|string|min:8',
            ]);
            $user->update($validatedData);
            DB::commit();
            return response()->json($user, 201);
        } catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['Erro ao atualizar usuário' => $exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(["mesage" => "Usuário não encontrado"], 404);
        }
        $user->delete();

        return response()->json(["message" => "Usuário exluído com sucesso"], 201);
    }
}
