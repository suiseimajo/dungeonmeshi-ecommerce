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
    
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        session()->flash('notif.success', 'Usuário criado com sucesso!');
        return redirect()->route('usuarios.index');
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        return view('usuarios.edit', compact('users'));

    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->update();

        session()->flash('notif.success', 'Usuário editado com sucesso!');
        return redirect()->route('usuarios.index');

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
