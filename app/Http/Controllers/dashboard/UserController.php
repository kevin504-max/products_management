<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();

            return view('dashboard.users.index', compact('users'));
        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            if (User::where('email', $request->email)->first()) {
                return redirect()->back()->with([
                    'status' => 'warning',
                    'message' => 'Já existe um usuário com esse e-mail.'
                ]);
            } else if (User::where('cpf', $request->cpf)->first()) {
                return redirect()->back()->with([
                    'status' => 'warning',
                    'message' => 'Já existe um usuário com esse CPF.'
                ]);
            }

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->password = bcrypt('12345678');
            $user->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Usuário cadastrado com sucesso!'
            ]);

        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Usuário atualizado com sucesso!'
            ]);

        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->delete();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Usuário excluído com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }
}
