<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        
        $users = User::paginate(5);

        return view('usuarios.index', compact('users'));

    }

    public function create()
    {
    
        return view('usuarios.create', compact('users'));
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        return view('usuarios.edit', compact('users'));

    }

    public function show(string $id)
    
    {
        
        $user = User::find($id);
        return view('usuarios.show', compact('user'));
    }

    public function destroy(string $id)
    {

        $user = User::find($id);
        if(isset($user->imagem))
        Storage::disk('public')->delete($user->imagem);
        $user->delete();
       
        session()->flash('notif.success', 'Usuário deletado com sucesso!');
        return redirect()->route('usuarios.index');

    }
}
